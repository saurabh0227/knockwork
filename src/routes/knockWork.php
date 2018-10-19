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
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, form-data, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('content-type','application/json');
});

/* ----------------------------------------------------------------------------------------------------------------- */
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
        
            array_push($result,$categoryModel);
        }

        $db = null;

        echo json_encode($result);

    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Add Category
$app->post('/api/category/add', function(Request $request, Response $response) {
    $categories_title = $request->getParam('categories_title');
    $categoies_icon_url = $request->getParam('categoies_icon_url');
    $categoies_description = $request->getParam('categoies_description');

    $sql = "INSERT INTO categories (categories_title,
                                    categoies_icon_url,
                                    categoies_description)
                            VALUES (:categories_title,
                                    :categoies_icon_url,
                                    :categoies_description)";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':categories_title', $categories_title);
        $stmt->bindParam(':categoies_icon_url', $categoies_icon_url);
        $stmt->bindParam(':categoies_description', $categoies_description);

        $stmt->execute();

        echo '{"notice": {"text": "Added SuccessFully"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Update Category
$app->put('/api/category/update/{categories_id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('categories_id');
    $categories_title = $request->getParam('categories_title');
    $categoies_icon_url = $request->getParam('categoies_icon_url');
    $categoies_description = $request->getParam('categoies_description');

    $sql = "UPDATE categories
            SET categories_title = :categories_title,
                categoies_icon_url = :categoies_icon_url,
                categoies_description = :categoies_description
            WHERE categories_id = $id";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':categories_title', $categories_title);
        $stmt->bindParam(':categoies_icon_url', $categoies_icon_url);
        $stmt->bindParam(':categoies_description', $categoies_description);

        $stmt->execute();

        echo '{"notice": {"text": "SuccessFully Updated"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Delete Category
$app->delete('/api/category/delete/{categories_id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('categories_id');

    $sql = "DELETE FROM categories WHERE categories_id = $id";

    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "SuccessFully Deleted"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
// Get all subCategories
$app->get('/api/subcategories', function(Request $request, Response $response) {
    $result = array();
    $sql = "SELECT sc_id,
                   sc_title,
                   sc_icon_url
            FROM sub_categories";
    try {
         //Get DB
         $db = new db();
         //Connect
         $db = $db->connect();

         $stmt = $db->query($sql);
         $subCategories = $stmt->fetchAll(PDO::FETCH_OBJ);

         foreach($subCategories as $subCategory) {
            $clientDetailSubCategoryModel = new ClientDetailSubCategoryModel();
            $clientDetailSubCategoryModel->setSub_category_id($subCategory->sc_id);
            $clientDetailSubCategoryModel->setSub_category_title($subCategory->sc_title);
            $clientDetailSubCategoryModel->setSub_category_icon_url($subCategory->sc_icon_url);
             array_push($result, $clientDetailSubCategoryModel);
         }

         $db = null;

         echo json_encode($result);

        } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Add SubCategory
$app->post('/api/subcategories/add', function(Request $request, Response $response) {
    $sc_title = $request->getParam('sc_title');
    $sc_icon_url = $request->getParam('sc_icon_url');

    $sql = "INSERT INTO sub_categories (sc_title,
                                    sc_icon_url)
                            VALUES (:sc_title,
                                    :sc_icon_url)";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':sc_title', $sc_title);
        $stmt->bindParam(':sc_icon_url', $sc_icon_url);

        $stmt->execute();

        echo '{"notice": {"text": "Added SuccessFully"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Update SubCategory
$app->put('/api/subcategories/update/{sc_id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('sc_id');
    $sc_title = $request->getParam('sc_title');
    $sc_icon_url = $request->getParam('sc_icon_url');

    $sql = "UPDATE sub_categories
            SET sc_title = :sc_title,
                sc_icon_url = :sc_icon_url
            WHERE categories_id = $id";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':sc_title', $sc_title);
        $stmt->bindParam(':sc_icon_url', $sc_icon_url);

        $stmt->execute();

        echo '{"notice": {"text": "SuccessFully Updated"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Delete SubCategory
$app->delete('/api/subcategories/delete/{sc_id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('sc_id');

    $sql = "DELETE FROM sub_categories WHERE sc_id = $id";

    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "SuccessFully Deleted"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Get SubCategories using categories_id
$app->get('/api/subcategories/{categories_id}',function(Request $request, Response $response) {
    $id = $request->getAttribute('categories_id');
    $result = array();
    $sql = "SELECT sub_categories.sc_id,
                   sub_categories.sc_title,
                   sub_categories.sc_icon_url,
                   categories.categories_id 
            FROM categories
            JOIN sub_categories ON categories.categories_id = sub_categories.categories_id
            where categories.categories_id = $id";
    try {
        //Get DB
        $db = new db();
        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $subCategories = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($subCategories as $subCategory) {
            $subCategoriesModel = new SubCategoriesModel();
            $subCategoriesModel->setSub_categories_id($subCategory->sc_id);
            $subCategoriesModel->setCategory_id($subCategory->categories_id);
            $subCategoriesModel->setSub_categories_title($subCategory->sc_title);
            $subCategoriesModel->setSub_categories_icon_url($subCategory->sc_icon_url);

            array_push($result, $subCategoriesModel);
        }

        $db = null;

         echo json_encode($result);
    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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

            //Client Details
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
        $PageModel->setList($list);
        $db = null;

        echo json_encode($PageModel);

    } catch(PDOException $err){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
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
        echo '{"text": "User Deleted"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
}); 
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
// Lancer search pagination
$app->get('/api/client/lancersearch/page/{page_no}', function(Request $request, Response $response) {
    $page_no = $request->getAttribute('page_no');
    $pageModel = new PageLancerModel();
    $list = array();
    $n = ($page_no-1)*10;

    $sqlCount = "SELECT count(free_lancers.f_id) AS COUNT
                 FROM free_lancers" ;
    
    $sql = "SELECT free_lancers.f_id,
                   user_registrations.ur_first_name,
                   user_registrations.ur_last_name,
                   user_registrations.ur_image_url,
                   user_registrations.ur_description,
                   address.country
            FROM free_lancers
            JOIN user_registrations ON free_lancers.ur_id = free_lancers.ur_id
            JOIN address ON user_registrations.address_id = address.address_id
            LIMIT $n,10";
    try {
        //Get DB object
        $db = new db();
        //connect
        $db = $db->connect();

        $stmtCount = $db->query($sqlCount);
        $count = $stmtCount->fetch(PDO::FETCH_OBJ);

        $pageModel->setPage($page_no);
        $pageModel->setCount($page_no*10);
        $pageModel->setTotal_count($count->COUNT);

        $stmt = $db->query($sql);
        $lancers = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($lancers as $lancer) {
            $clientLancerSearchModel = new ClientLancerSearchModel();
            $clientLancerSearchModel->setId($lancer->f_id);
            $clientLancerSearchModel->setFirst_name($lancer->ur_first_name);
            $clientLancerSearchModel->setLast_name($lancer->ur_last_name);
            $clientLancerSearchModel->setImage_url($lancer->ur_image_url);
            $clientLancerSearchModel->setCountry($lancer->country);

            $sqlEarned = "SELECT sum(earned.earn) as EARN
                          FROM earned
                          JOIN free_lancers ON earned.f_id = free_lancers.f_id
                          WHERE earned.f_id = $lancer->f_id";
            $stmtEarned = $db->query($sqlEarned);
            $earn = $stmtEarned->fetch(PDO::FETCH_OBJ);
            $clientLancerSearchModel->setEarn($earn->EARN);
            
            //$clientLancerSearchModel->setFeedback();
            $clientLancerSearchModel->setDescription($lancer->ur_description);

            array_push($list, $clientLancerSearchModel);
        }

        $pageModel->setList($list);

        $db = null;

        echo json_encode($pageModel);

    } catch(PDOException $err) {
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Add JobType
$app->post('/api/jobtype/add', function (Request $request, Response $response) {
    $jt_title = $request->getParam('jt_title');

    $sql = "INSERT INTO job_types (jt_title)
                           VALUES (:jt_title)";
    try {
        //Get DB object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':jt_title', $jt_title);

        $stmt->execute();

        echo '{"text": "User Added"}';
        } catch(PDOException $e){
            echo '{"error": '.$err->getMessage().'}';
        }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Update JobType
$app->put('/api/jobtype/update/{jt_id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('jt_id');

    $sql = "UPDATE job_types
            SET jt_title = :jt_title
            WHERE jt_id = $id";
    try {
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':jt_title', $jt_title);

        $stmt->execute();

        echo '{"text": "SuccessFully Updated"}';
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Delete Job Type
$app->delete('/api/jobtype/delete/{jt_id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('jt_id');

    $sql = "DELETE FROM job_types WHERE jt_id = $id";

    try {
        //Get DB object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        echo '{"text": "User Deleted"}';
        $db = null;
    } catch(PDOException $e){
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
// Get Suggestion List
$app->get('/api/suggestionlist', function (Request $request, Response $response) {
    $result = array();
    $sql = "SELECT categories.categories_id as id, categories.categories_title as title FROM categories 
    UNION 
    SELECT sub_categories.sc_id, sub_categories.sc_title
    FROM sub_categories";

    try {
        //Get DB
        $db = new db();
        //Connect
        $db = $db->connect();

        $stmtCategory = $db->query($sql);
        $categories = $stmtCategory->fetchAll(PDO::FETCH_OBJ);

        foreach($categories as $category) {
            $csm = new CategorySubCategoryModel();
            //$csm->setId($category->id);
            $csm->setTitle($category->title);

            array_push($result, $csm);
        }

        $db = null;

         echo json_encode($result);

    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------------- */
//Search lancers basis on categories and subCategories
$app->post('/api/lancersearch/{page_no}',function (Request $request, Response $response) {
    //$arr = array();
    $title = $request->getParam('title');
    $result = array();
    $result["error"] = FALSE;
    $page_no = $request->getAttribute('page_no');
    $pageModel = new PageLancerModel();
    $result["result"] = array();


    $n = ($page_no-1)*10;

    $sqlCount = "SELECT count(search_lancer.sl_id) AS COUNT
                 FROM search_lancer";

    $sql = "SELECT user_registrations.ur_first_name,
                   user_registrations.ur_last_name,
                   user_registrations.ur_id,
                   free_lancers.f_id,
                   user_registrations.ur_phone_no,
                   user_registrations.ur_email,
                   user_registrations.ur_image_url,
                   address.country,
                   user_registrations.ur_description
            FROM free_lancers
            JOIN user_registrations ON free_lancers.ur_id = user_registrations.ur_id
            JOIN address ON user_registrations.address_id = address.address_id
            JOIN search_lancer ON free_lancers.f_id = search_lancer.f_id
            JOIN categories ON search_lancer.categories_id = categories.categories_id
            JOIN sub_categories ON search_lancer.sc_id = sub_categories.sc_id
            WHERE categories.categories_title LIKE '$title%' OR sub_categories.sc_title LIKE '$title%'
            LIMIT $n,10";
    try {
        //Get DB
        $db = new db();
        //Connect DB
        $db = $db->connect();

        $stmtCount = $db->query($sqlCount);
        $count = $stmtCount->fetch(PDO::FETCH_OBJ);

        $pageModel->setPage($page_no);
        $pageModel->setCount($page_no*10);
        $pageModel->setTotal_count($count->COUNT);
        

        $stmt = $db->query($sql);
        $lancers = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        if($lancers!=null){
            foreach($lancers as $lancer) {
                $lsm = new LancerSearchModel();
                $lsm->setF_id($lancer->f_id);
                $lsm->setUr_id($lancer->ur_id);
                $lsm->setFirst_name($lancer->ur_first_name);
                $lsm->setLast_name($lancer->ur_last_name);
                $lsm->setPhone_no($lancer->ur_phone_no);
                $lsm->setEmail_address($lancer->ur_email);
                $lsm->setImage_url($lancer->ur_image_url);
                $lsm->setCountry($lancer->country);
                $lsm->setDescription($lancer->ur_description);

                $sqlEarned = "SELECT sum(earned.earn) as EARN
                          FROM earned
                          JOIN free_lancers ON earned.f_id = free_lancers.f_id
                          WHERE earned.f_id = $lancer->f_id";
                $stmtEarned = $db->query($sqlEarned);
                $earn = $stmtEarned->fetch(PDO::FETCH_OBJ);
                $lsm->setEarning($earn->EARN);

            array_push($result["result"], $lsm);
            }
        }else
        {
            $result["error"] = TRUE;
            $result["message"] = "No result found";
        }
        $pageModel->setList($result["result"]);
        $db = null;
        $data=new DataModel();
        $data->SetData($pageModel);
        echo json_encode($data);
        //echo json_encode($arr);

    } catch (PDOException $e) {
        echo '{"error": '.$err->getMessage().'}';
    }
});
/* ----------------------------------------------------------------------------------------------------------------- */