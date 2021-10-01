<!-- # Webscrapper
php script for webscrapper along with php mailer

### Folder Structure

        ├── database                      # Database for crud operation on keywords, pages and mail recipients
        ├── pages                         # pages offline pages, if you want to search put the pages there and provide file path
        ├── PHPMailer                     # PHPMailer mail library
        ├── index.html                    # Index.html main file to list datatable
        ├── index.php                     # ndex.php main backend to handle incoming request
        ├── KeywordGrabber.php            # KeywordGrabber class responsible for your task
        ├── sample_html_dom.php           # Simple_html_dom helper parser for crawling
        ├── LICENSE
        └── README.md

    
Quick Setup
        
       Upload the database provided to your database  <br/>
       Open file KeywordGrabber.php Edit correct database credential to connect
       
      
        function setConnection(){
            $this->db = new PdoCrud();
            $this->db->connect(['dsn' => 'mysql:host=localhost;dbname=db_keywords', 'user' => 'root', 'password' => '']);
        }

       
        
        Apply your SMTP credential for mailer
        
        function setUpMailer()
        {
                $this->mailer = new PHPMailer(true);

                try {
                    //Setup SMTP
                    $this->mailer->isSMTP();                      // Set mailer to use SMTP 
                    $this->mailer->Host = 'localhost';            // Specify main and backup SMTP servers 
                    $this->mailer->SMTPAuth = false;              // Enable SMTP authentication 
                    $this->mailer->Username = 'user@gmail.com';   // SMTP username 
                    $this->mailer->Password = 'gmail_password';   // SMTP password 
                    $this->mailer->SMTPSecure = '';               // Enable TLS encryption, `ssl` also accepted 
                    $this->mailer->Port = 25;
                } catch (Exception $e) {
                    die('Mailer Error occured!' . $e->getMessage());
                }
            }
            
         
   ### Run Application 
   Place files and folder to server document root or for local environment
   cd keyword-search
   php -S localhost:3000 -->
   
   
Webscrapper 
============================

> Starter Public Php script for Webscrapper along with php mailer

### Folder Structure

    .
        ├── database                      # Database for crud operation on keywords, pages and mail recipients
        ├── pages                         # pages offline pages, if you want to search put the pages there and provide file path
        ├── PHPMailer                     # PHPMailer mail library
        ├── index.html                    # index.html main file to list datatable
        ├── index.php                     # index.php main backend to handle incoming request
        ├── KeywordGrabber.php            # KeywordGrabber class responsible for your task
        ├── sample_html_dom.php           # Simple_html_dom helper parser for crawling
        ├── LICENSE
        └── README.md


### Quick Setup
> Upload the database provided to your database
> Open file KeywordGrabber.php Edit correct database credential to connect
  
```
        function setConnection(){
                $this->db = new PdoCrud();
                $this->db->connect(['dsn' => 'mysql:host=localhost;dbname=db_keywords', 'user' => 'root', 'password' => '']);
        }
 ```
> Apply your SMTP credential for mailer
  
```
         function setUpMailer(){
                $this->mailer = new PHPMailer(true);
                try {
                    //Setup SMTP
                    $this->mailer->isSMTP();                      // Set mailer to use SMTP 
                    $this->mailer->Host = 'localhost';       // Specify main and backup SMTP servers 
                    $this->mailer->SMTPAuth = false;               // Enable SMTP authentication 
                    $this->mailer->Username = 'user@gmail.com';   // SMTP username 
                    $this->mailer->Password = 'gmail_password';   // SMTP password 
                    $this->mailer->SMTPSecure = '';            // Enable TLS encryption, `ssl` also accepted 
                    $this->mailer->Port = 25;
                } catch (Exception $e) {
                    die('Mailer Error occured!' . $e->getMessage());
                }
          }
 ```
 
 ### Run app 
 >Place files and folder to server document root or for local environment
 ```
 cd keyword-search
 php -S localhost:3000
 
 ``` 
 #Assumption 
 >PHP is installed
 >MySQL is installed
 >Has SMTP credential for mailing
