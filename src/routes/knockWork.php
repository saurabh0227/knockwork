<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('content-type','application/json');
});

// Get All Categories
$app->get('/api/categories', function(Request $request, Response $response) {
    $result = array();
    $sql = "SELECT categories_id,
                   categories_title,
                   categories_icon_url,
                   categories_description
            FROM categories";
    
    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($categories as $category) {
            $categoryModel = new CategoriesModel();
            $categoryModel->setCategories_id($category->categories_id);
            $categoryModel->setCategories_title($category->categories_title);
            $categoryModel->setCategories_image_url($category->categories_icon_url);
            $categoryModel->setCategories_description($category->categories_description);
        
            // //$id = $category->ps_id;
            // $sqlPopularityStatus = "SELECT ps_title
            //                         FROM popular_services
            //                         JOIN categories ON popular_services.ps_id = categories.ps_id
            //                         WHERE categories.categories_id =".$categoryModel->getCategories_id();
            // $stmtPopularityStatus = $db->query($sqlPopularityStatus);
            // $popularityStatus = $stmtPopularityStatus->fetch(PDO::FETCH_OBJ);
            // $categoryModel->setPopularity_status($popularityStatus->ps_title);
        

            array_push($result,$categoryModel);
        }

        $db = null;

        echo json_encode($result);

    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});

// Get All Popular Services
$app->get('/api/popularservices',function(Request $request, Response $response) {
    $result = array();
    $sql = "SELECT categories.categories_id,
                   categories.categories_title,
                   categories.categories_icon_url
            FROM categories
            WHERE categories.ps_id = 1 limit 10";
    try {
        //Get DB
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $popularServices = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($popularServices as $popularService) {
            $popularServicesModel = new PopularServicesModel();
            $popularServicesModel->setId($popularService->categories_id);
            $popularServicesModel->setTitle($popularService->categories_title);
            $popularServicesModel->setImage_url($popularService->categories_icon_url);

            array_push($result,$popularServicesModel);
        }

        $db = null;

        echo json_encode($result);

    }  catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});


// Detailed Job Description
$app->get('/api/jobdescriptions/lancer/detailed/{jd_id}', function(Request $request, Response $response) {
    $jd_id = $request->getAttribute('jd_id');
    $result = array();
    $sqlDetailedDescription = "SELECT jd_id,
                                      jd_title,
                                      jd_description,
                                      jd_updated_at,
                                      jd_duration,
                                      jd_budget
                                FROM job_descriptions
                                WHERE jd_id = $jd_id";
    try {
        // Get DB
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmtDetailedDescription = $db->query($sqlDetailedDescription);
        $detailedDescriptions = $stmtDetailedDescription->fetchAll(PDO::FETCH_OBJ);

        foreach( $detailedDescriptions as $detailedDescription) {
            $detailedJobDescriptionModel = new DetailedJobDescriptionModel();
            $detailedJobDescriptionModel->setJd_id($detailedDescription->jd_id);
            $detailedJobDescriptionModel->setJd_title($detailedDescription->jd_title);
            $detailedJobDescriptionModel->setJd_updated_at($detailedDescription->jd_updated_at);

            // Quotes Count
            $sqlQuotes = "SELECT COUNT(q_id) AS COUNT 
                          FROM quotes 
                          WHERE jd_id=".$detailedJobDescriptionModel->getJd_id();
            $stmtQuotes = $db->query($sqlQuotes);
            $quotesCount = $stmtQuotes->fetch(PDO::FETCH_OBJ); 
            $detailedJobDescriptionModel->setQuotes($quotesCount->COUNT);

            $detailedJobDescriptionModel->setJd_duration($detailedDescription->jd_duration);
            $detailedJobDescriptionModel->setJd_budget($detailedDescription->jd_budget);

            //Job Type
            $sqlJobType = "SELECT jt_title 
                           FROM job_types
                           JOIN job_descriptions 
                           ON job_types.jt_id = job_descriptions.jt_id
                           WHERE job_descriptions.jd_id = $jd_id";
            $stmtJobType = $db->query($sqlJobType);
            $jobType = $stmtJobType->fetch(PDO::FETCH_OBJ);
            $detailedJobDescriptionModel->setJob_type($jobType->jt_title);

            $detailedJobDescriptionModel->setJd_descriptions($detailedDescription->jd_description);

            //Required skills
            $sqlRequirdSkills = "SELECT sub_categories.sc_title
                                 FROM required_skills
                                 JOIN sub_categories on required_skills.sc_id = sub_categories.sc_id
                                 JOIN job_descriptions on required_skills.jd_id = job_descriptions.jd_id
                                 WHERE job_descriptions.jd_id = $jd_id";
            $stmtRequiredSkills = $db->query($sqlRequirdSkills);
            $requiredSkills = $stmtRequiredSkills->fetchAll(PDO::FETCH_OBJ);
            $arrRequiredSkills = array();
            foreach ($requiredSkills as $requiredSkill) {
                $requiredSkillsModel = new RequiredSkillsModel();
                $requiredSkillsModel->set_skill($requiredSkill->sc_title);

                array_push($arrRequiredSkills, $requiredSkillsModel);
            }

            $detailedJobDescriptionModel->setRequired_skills($arrRequiredSkills);

            // Client Details

            $clientLancerModel = new ClientLancerModel();
            $sqlClientDetails = "SELECT user_registrations.ur_first_name,
                                        user_registrations.ur_last_name,
                                        address.country,
                                sum(spend.spend) AS SPEND
                                FROM job_descriptions
                                JOIN clients ON job_descriptions.c_id = clients.c_id
                                JOIN user_registrations ON clients.ur_id = user_registrations.ur_id
                                JOIN address ON user_registrations.address_id = address.address_id
                                JOIN spend ON clients.c_id = spend.c_id
                                WHERE job_descriptions.jd_id = $jd_id";
            $stmtClientDetail = $db->query($sqlClientDetails);
            $clientDetail = $stmtClientDetail->fetch(PDO::FETCH_OBJ);

            $clientLancerModel->setFirst_name($clientDetail->ur_first_name);
            $clientLancerModel->setLast_name($clientDetail->ur_last_name);
            $clientLancerModel->setCountry($clientDetail->country);
            $clientLancerModel->setTotal_spend($clientDetail->SPEND);
            
            $detailedJobDescriptionModel->setClient_detail($clientLancerModel);

            array_push($result, $detailedJobDescriptionModel);
        }

        $db = null;

        echo json_encode($result);

    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});

// Get One Job Description with complete detail
$app->get('/api/jobdescriptions/{jd_id}', function(Request $request, Response $response) {
    $jd_id = $request->getAttribute('jd_id');
    $result = array();
    $sqlDescription = "SELECT jd_id,
                              jd_title,
                              jd_description,
                              jd_created_at,
                              jd_updated_at,
                              jd_duration,
                              jd_budget
                        FROM job_descriptions
                        WHERE jd_id = $jd_id";
    try {
        // Get DB
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmtDescription = $db->query($sqlDescription);
        $descriptions = $stmtDescription->fetchAll(PDO::FETCH_OBJ);

        foreach ($descriptions as $description) {
            $jobDescriptionModel = new JobDescriptionModel();
            $jobDescriptionModel->setJd_id($description->jd_id);
            $jobDescriptionModel->setJd_title($description->jd_title);
            $jobDescriptionModel->setJd_description($description->jd_description);
            $jobDescriptionModel->setJd_created_at($description->jd_created_at);
            $jobDescriptionModel->setJd_updated_at($description->jd_updated_at);
            $jobDescriptionModel->setJd_duration($description->jd_duration);
            $jobDescriptionModel->setJd_budget($description->jd_budget);

            //JOb Type
            $sqlJobType = "SELECT jt_title 
                           FROM job_types
                           JOIN job_descriptions ON job_types.jt_id = job_descriptions.jt_id
                           WHERE job_descriptions.jd_id = $jd_id";
            $stmtJobType = $db->query($sqlJobType);
            $jobType = $stmtJobType->fetch(PDO::FETCH_OBJ);
            $jobDescriptionModel->setJob_type($jobType->jt_title);

            //Number of quotes
            $sqlQuotes = "SELECT COUNT(q_id) AS COUNT 
                          FROM quotes
                          WHERE jd_id=".$jobDescriptionModel->getJd_id();
            $stmtQuotes = $db->query($sqlQuotes);
            $quotesCount = $stmtQuotes->fetch(PDO::FETCH_OBJ); 
            $jobDescriptionModel->setQuotes_count($quotesCount->COUNT);
            
            //Clients Details
            $clientDetailModel = new ClientDetailModel();
            $sqlClientDetails = "SELECT clients.c_id,
	                                    user_registrations.ur_id, user_registrations.ur_first_name, user_registrations.ur_last_name,
                                        user_registrations.ur_image_url,
                                        address.address_id, address.country,
                                 sum(spend.spend) AS SPEND
                                 FROM job_descriptions
                                 JOIN clients ON job_descriptions.c_id = clients.c_id
                                 JOIN user_registrations ON clients.ur_id = user_registrations.ur_id
                                 JOIN address ON user_registrations.address_id = address.address_id
                                 JOIN spend ON clients.c_id = spend.c_id
                                 WHERE job_descriptions.jd_id  = $jd_id";

            $stmtClientDetails = $db->query($sqlClientDetails);
            $clientDetail = $stmtClientDetails->fetch(PDO::FETCH_OBJ);
            
            $clientDetailModel->setClient_id($clientDetail->c_id);
            $clientDetailModel->setUser_registration_id($clientDetail->ur_id);
            $clientDetailModel->setFirst_name($clientDetail->ur_first_name);
            $clientDetailModel->setLast_name($clientDetail->ur_last_name);
            $clientDetailModel->setImage_url($clientDetail->ur_image_url);
            $clientDetailModel->setAddress_id($clientDetail->address_id);
            $clientDetailModel->setCountry($clientDetail->country);
            $clientDetailModel->setSpend($clientDetail->SPEND);
            $jobDescriptionModel->setClientDetail($clientDetailModel);

            //Categories
            $sqlClientDetailCategory = "SELECT categories.categories_id,
                                               categories.categories_title,
                                               categories.categories_icon_url,
                                               categories.categories_description
                                        FROM required_skills
                                        JOIN categories ON required_skills.categories_id = categories.categories_id
                                        JOIN job_descriptions ON required_skills.jd_id = job_descriptions.jd_id
                                        WHERE job_descriptions.jd_id = $jd_id";
            $stmtClientDetailCategory = $db->query($sqlClientDetailCategory);
            $clientDetailCategories = $stmtClientDetailCategory->fetchAll(PDO::FETCH_OBJ);
            $arrCategory = array();
            foreach($clientDetailCategories as $clientDetailCategory) {
                $clientDetailCategoryModel = new ClientDetailCategoryModel();
                $clientDetailCategoryModel->setCategory_id($clientDetailCategory->categories_id);
                $clientDetailCategoryModel->setCategory_title($clientDetailCategory->categories_title);
                $clientDetailCategoryModel->setCategory_icon_url($clientDetailCategory->categories_icon_url);
                $clientDetailCategoryModel->setCategory_description($clientDetailCategory->categories_description);

                array_push($arrCategory, $clientDetailCategoryModel);
            }
            $jobDescriptionModel->setCategory($arrCategory);

            //Sub-Categories
            $sqlSubCategory = "SELECT sub_categories.sc_id,
                                      sub_categories.sc_title,
                                      sub_categories.sc_icon_url
                                FROM required_skills
                                JOIN sub_categories ON required_skills.sc_id = sub_categories.sc_id
                                JOIN job_descriptions ON required_skills.jd_id = job_descriptions.jd_id
                                WHERE job_descriptions.jd_id = $jd_id";
            $stmtSubCategory = $db->query($sqlSubCategory);
            $subCategories = $stmtSubCategory->fetchAll(PDO::FETCH_OBJ);
            $arrSubCategories = array();
            foreach($subCategories as $subCategory) {
                $clientDetailSubCategoryModel = new ClientDetailSubCategoryModel();
                $clientDetailSubCategoryModel->setSub_category_id($subCategory->sc_id);
                $clientDetailSubCategoryModel->setSub_category_title($subCategory->sc_title);
                $clientDetailSubCategoryModel->setSub_category_icon_url($subCategory->sc_icon_url);

                array_push($arrSubCategories, $clientDetailSubCategoryModel);
            }
            $jobDescriptionModel->setSub_category($arrSubCategories);

            array_push($result, $jobDescriptionModel);
        }

        $db = null;

        echo json_encode($result);

    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});

// Job Description Pagination
$app->get('/api/jobdescriptions/lancer/page/{page_no}', function(Request $request, Response $response) {
    $page_no = $request->getAttribute('page_no');
    $PageModel = new PageLancerModel();
   
    $list = array();
    $n = ($page_no-1)*10;

    $sqlCount = "SELECT count(jd_id) as Count
                 FROM job_descriptions";

    $sql = "SELECT jd_id,
                   c_id,
                   jd_title,
                   jd_budget,
                   jd_description,
                   jd_updated_at
            FROM job_descriptions ORDER BY jd_updated_at DESC LIMIT $n,10 ";

    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        
        $stmtcount = $db->query($sqlCount);
        $count = $stmtcount->fetch(PDO::FETCH_OBJ);

        
        
        $PageModel->setPage($page_no);
        $PageModel->setCount($page_no*10); 
        $PageModel->setTotal_count($count->Count);
        
        $stmt = $db->query($sql);
        $jobDescriptionPage = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($jobDescriptionPage as $jdp) {
            $jdModel = new JObDescriptionLancerModel();
            $jdModel->setJd_id($jdp->jd_id);
            $jdModel->setJd_title($jdp->jd_title);

            // Price Type
            $sqlPriceType = "SELECT pt_title FROM price_type";
            $stmtPriceType = $db->query($sqlPriceType);
            $priceType = $stmtPriceType->fetch(PDO::FETCH_OBJ);
            $jdModel->setJd_price_type($priceType->pt_title);

            $jdModel->setJd_budget($jdp->jd_budget);
            $jdModel->setJd_description($jdp->jd_description);
            $jdModel->setJd_updated_at($jdp->jd_updated_at);  
            
            // Number of Quotes
            $sqlQuotes = "SELECT COUNT(q_id) AS COUNT 
                          FROM quotes
                          WHERE jd_id=".$jdModel->getJd_id();
            $stmtQuotes = $db->query($sqlQuotes);
            $quotesCount = $stmtQuotes->fetch(PDO::FETCH_OBJ);         
            $jdModel->setJd_quotes($quotesCount->COUNT);

            $jdModel->setJd_client($jdp->c_id);
            if($jdp->c_id){
                $clientModel = new ClientLancerModel();
            
                $sqlClient = "SELECT clients.c_id,
                                     user_registrations.ur_first_name,
                                     user_registrations.ur_last_name,
                                     address.country,
                              sum(spend.spend) AS Spend
                              FROM (job_descriptions
                              JOIN clients ON job_descriptions.c_id=clients.c_id
                              JOIN user_registrations ON clients.ur_id=user_registrations.ur_id
                              JOIN address ON user_registrations.address_id=address.address_id 
                              JOIN spend ON clients.c_id=spend.c_id)  
                              WHERE clients.c_id = ".$jdp->c_id;

                $stmtClient = $db->query($sqlClient);
                $clientData = $stmtClient->fetch(PDO::FETCH_OBJ);
                
                $sqlFeedback="SELECT (count(distinct client_feedbacks.jd_id)/count(distinct job_descriptions.jd_id))*100 
                              AS client_feedback 
                              FROM client_feedbacks, job_descriptions 
                              WHERE client_feedbacks.c_id = ".$jdp->c_id." and job_descriptions.c_id = ".$jdp->c_id;




                $stmtFeedback = $db->query($sqlFeedback);
                $FeedbackData = $stmtFeedback->fetch(PDO::FETCH_OBJ);         
                
                $clientModel->setFirst_name($clientData->ur_first_name);
                $clientModel->setLast_name($clientData->ur_last_name);
                $clientModel->setCountry($clientData->country);
                $clientModel->setTotal_spend($clientData->Spend);              
                if($FeedbackData->client_feedback!=null){
                    $clientModel->setFeedback($FeedbackData->client_feedback);                                      
                } else{
                    $clientModel->setFeedback(0);
                }                       
                
                
                $jdModel->setJd_client($clientModel);
            }
            
            array_push($list,$jdModel);
        }
        $PageModel->setJob_list($list);
        $db = null;

        echo json_encode($PageModel);

    } catch(PDOException $err){
        echo '{"error": '.$err->getMessage().'}';
    }
});

// User Registration
$app->post('/api/userregistration/add', function(Request $request, Response $response) {
    $ur_firebase_id = $request->getParam('ur_firebase_id');
    $ur_first_name = $request->getParam('ur_first_name');
    $ur_last_name = $request->getParam('ur_last_name');
    $ur_email = $request->getParam('ur_email');
    $ur_phone_no = $request->getParam('ur_phone_no');
    $ur_image_url = $request->getParam('ur_image_url');
    $ur_status_free_lancer = $request->getParam('ur_status_free_lancer');
    $ur_status_client = $request->getParam('ur_status_client');

    $sql = "INSERT INTO user_registrations (ur_firebase_id,
                                           ur_first_name,
                                           ur_last_name,
                                           ur_email,
                                           ur_phone_no,
                                           ur_image_url,
                                           ur_status_free_lancer,
                                           ur_status_client)
                                   VALUES (:ur_firebase_id,
                                           :ur_first_name,
                                           :ur_last_name,
                                           :ur_email,
                                           :ur_phone_no,
                                           :ur_image_url,
                                           :ur_status_free_lancer,
                                           :ur_status_client)";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':ur_firebase_id', $ur_firebase_id);
        $stmt->bindParam(':ur_first_name', $ur_first_name);
        $stmt->bindParam('ur_last_name', $ur_last_name);
        $stmt->bindParam('ur_email', $ur_email);
        $stmt->bindParam('ur_phone_no', $ur_phone_no);
        $stmt->bindParam('ur_image_url', $ur_image_url);
        $stmt->bindParam('ur_status_free_lancer', $ur_status_free_lancer);
        $stmt->bindParam('ur_status_client', $ur_status_client);

        $stmt->execute();

        echo '{"notice": {"text": "User Added"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});

// Update User
$app->put('/api/userregistration/update/{ur_id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('ur_id');
    $ur_firebase_id = $request->getParam('ur_firebase_id');
    $ur_first_name = $request->getParam('ur_first_name');
    $ur_last_name = $request->getParam('ur_last_name');
    $ur_email = $request->getParam('ur_email');
    $ur_phone_no = $request->getParam('ur_phone_no');
    $ur_image_url = $request->getParam('ur_image_url');
    $ur_status_free_lancer = $request->getParam('ur_status_free_lancer');
    $ur_status_client = $request->getParam('ur_status_client');

    $sql = "UPDATE user_registrations 
            SET ur_firebase_id = :ur_firebase_id,
                ur_first_name = :ur_first_name,
                ur_last_name = :ur_last_name,
                ur_email = :ur_email,
                ur_phone_no = :ur_phone_no,
                ur_image_url = :ur_image_url,
                ur_status_free_lancer = :ur_status_free_lancer,
                ur_status_client = :ur_status_client
            WHERE ur_id = $id";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':ur_firebase_id', $ur_firebase_id);
        $stmt->bindParam(':ur_first_name', $ur_first_name);
        $stmt->bindParam('ur_last_name', $ur_last_name);
        $stmt->bindParam('ur_email', $ur_email);
        $stmt->bindParam('ur_phone_no', $ur_phone_no);
        $stmt->bindParam('ur_image_url', $ur_image_url);
        $stmt->bindParam('ur_status_free_lancer', $ur_status_free_lancer);
        $stmt->bindParam('ur_status_client', $ur_status_client);

        $stmt->execute();

        echo '{"notice": {"text": "User Updated"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});

//Delete User
$app->delete('/api/userregistration/delete/{ur_id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('ur_id');

    $sql = "DELETE FROM user_registrations WHERE ur_id = $id";

    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "User Deleted"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});


/*
//Lancer Category/Sub-category search data
$app->get('/api/jobdescriptions/lancer/search/{pageno}/{categories_id}', function(Request $request, Response $response) {
$page_no = $request->getAttribute('page_no');
$categories_id = $getAttribute('categories_id');
$PageModel = new PageLancerModel();

$list = array();
$n = ($page_no-1)*10;

$sqlCount = "SELECT count(jd_id) as Count FROM job_descriptions";

try {

    //Get DB Object
    $db = new db();
    // Connect
    $db = $db->connect();

    $stmtcount = $db->query($sqlCount);
    $count = $stmtcount->fetch(PDO::FETCH_OBJ);
    $PageModel->setPage($page_no);
    $PageModel->setCount($page_no*10); 
    $PageModel->setTotal_count($count->Count);

} catch (PDOException $err) {
    echo '{"error": '.$err->getMessage().'}';
    }
});
*/