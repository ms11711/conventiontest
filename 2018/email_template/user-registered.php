<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.sparkpost.com/api/v1/transmissions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"options\": {
    \"open_tracking\": true,
    \"click_tracking\": true
  }, 
  \"return_path\": \"bounce@yja.org\", 
  \"substitution_data\": {
    \"name\": \"".$user->name."\",    
  },
  \"recipients\": [
    {
      \"return_path\": \"bounce@yja.org\",
      \"address\": {
        \"email\": \"".$user->email."\"
      }  
    }
  ],
  \"content\": {
    \"from\": {
      \"name\": \"YJA Registration\",
      \"email\": \"reghelp@yja.org\"
    }, 
    \"reply_to\": \"YJA Registration <reghelp@yja.org>\",
    \"template_id\":\"user-registered\"
  }
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: f9fa29e2b705380748ca51b10c4ed65d1ac013e2"
));

$response = curl_exec($ch);

curl_close($ch);
 

?>