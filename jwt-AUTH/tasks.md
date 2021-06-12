# task one
create a users table 

`--msql
CREATE  TABLE IF NOT EXISTS `Users` (
  `id` INT  AUTO_INCREMENT ,
  `first_name` VARCHAR(150) NOT NULL ,
  `last_name` VARCHAR(150) NOT NULL ,
  `email` VARCHAR(255),
  `password` VARCHAR(255),
  PRIMARY KEY (`id`) );


`

# task tow
Creating the Project Directory Structure

- mkdir php-jwt-example
- cd php-jwt-example
- mkdir api && cd api
- mkdir config
- -create databse.php file

# task three
## Installing php-jwt
>  composer require firebase/php-jwt

# task four 
Adding the User Registration API Endpoint

# task five
Adding the User Login API Endpoint

# jwt
‏يمكنك تعريف بنية بيانات الرمز المميز كما تريد أي (يمكنك إضافة البريد الإلكتروني للمستخدم أو معرفه فقط أو كليهما مع أي معلومات إضافية مثل اسم المستخدم) ولكن هناك بعض مطالبات JWT المحجوزة التي يجب تعريفها بشكل صحيح لأنها تؤثر على صحة رمز JWT المميز ، مثل:‏

‏IAT - الطابع الزمني لإصدار الرمز المميز.‏

‏iss – سلسلة تحتوي على اسم أو معرف تطبيق المصدر. يمكن أن يكون اسم مجال ويمكن استخدامه لتجاهل الرموز المميزة من التطبيقات الأخرى.‏

‏nbf - الطابع الزمني للوقت الذي يجب أن يبدأ فيه اعتبار الرمز المميز صالحا. يجب أن يساوي أو أكبر من iat. في هذه الحالة، سيبدأ الرمز المميز في أن يكون صالحا بعد 10 ثوان من إصداره‏

‏exp - الطابع الزمني لمتى يجب إيقاف الرمز المميز ليكون صالحا. يجب أن تكون أكبر من IAT و nbf. في مثالنا، ستنتهي صلاحية الرمز المميز بعد 60 ثانية من إصداره.‏

‏هذه المطالبات غير مطلوبة، ولكنها مفيدة لتحديد صلاحية الرمز المميز.‏

‏حمولة JWT لدينا داخل المطالبة البيانات، أضفنا الاسم الأول واسم العائلة والبريد الإلكتروني وهوية المستخدم من قاعدة البيانات. لا يجب إضافة أي معلومات حساسة في حمولة JWT.‏

‏الأسلوب سوف يحول مجموعة PHP إلى تنسيق JSON ويوقع على الحمولة ثم ترميز الرمز المميز النهائي JWT الذي سيتم إرساله إلى العميل. في مثالنا، نحن ببساطة hradcoded المفتاح السري الذي سيتم استخدامه لتوقيع حمولة JWT ولكن في الإنتاج، تحتاج إلى التأكد من استخدام مفتاح سري مع سلسلة طويلة، ثنائي، وتخزينها في ملف التكوين.‏JWT::encode()

‏لدينا الآن اثنين من نقاط النهاية RESTful لتسجيل وتسجيل المستخدمين في. عند هذه النقطة، يمكنك استخدام عميل REST مثل ساعي البريد ل intercat مع API.

## task six
Protecting an API Endpoint Using JWT

Before accessing an endpoint a JWT token is sent with every request from the client. The server needs to decode the JWT and check if it's valid before allowing access to the endpoint.

Inside the api folder, create a protected.php file and add the following code:
