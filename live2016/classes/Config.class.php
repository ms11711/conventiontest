<?php

/**
 * Configuration Class
 */

// PLEASE REFER DOCUMENTATION FOR FILLING THE CONFIGURATION : http://securelogin.arneetsingh.com/docs/

class Config
{
    const 	DB_HOST = 'localhost',
            DB_NAME = 'registration2016',
            DB_USER = 'root',
            DB_PASS = 'yja$bo@rd',
            SMTP_HOST = 'smtp.sparkpostmail.com',
            SMTP_USER = 'SMTP_Injection',
            SMTP_PASS = 'f3d4410badd4a645b363f6a235075c518c191e66',
            SMTP_PORT = '587',
            SMTP_SECURE = 'tls',  //tls or ssl
            EMAIL_HEADER = 'Secure User Login/SignUp',
            CONTACT_EMAIL = 'pujen.solanki.la@yja.org',

            //GOOGLE RECAPTCHA CONFIGURATION

            RECAPTCHA_SITEKEY = '6Lf7vhQTAAAAAKYPLcT2rWaYrauu2PudoQ3N8Rlt',
            RECAPTCHA_SECRETKEY = '6Lf7vhQTAAAAAEt_GZsfWZh_vz2o-8n_FwrQqTEU',

            // ONE CLICK SOCIAL LOGIN CONFIGURATION

            BASE_URL = "http://convention.yja.org/vendor/hybridauth/",

            FACEBOOK_APP_ID = '',
            FACEBOOK_APP_SECRET = '',

            GOOGLE_APP_ID = '',
            GOOGLE_APP_SECRET = '',
            GOOGLE_REQUEST_URI = "http://<YOURDOMAIN.COM>/vendor/hybridauth/?hauth.done=Google",

            TWITTER_APP_ID = '',
            TWITTER_APP_SECRET = '',

            LINKEDIN_APP_ID = '',
            LINKEDIN_APP_SECRET = '',

            YAHOO_APP_ID = '',
            YAHOO_APP_SECRET = '',

            FOURSQUARE_APP_ID = '',
            FOURSQUARE_APP_SECRET = '',

            VKONTAKTE_APP_ID = '',
            VKONTAKTE_APP_SECRET = ''
            ;
}
