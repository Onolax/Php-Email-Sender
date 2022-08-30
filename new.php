

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Mail Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;700&family=Montserrat:wght@300;400&family=Open+Sans:wght@300&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main>
        <header>
            <h2>Email Sender</h2>
        </header>
        <section>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="from"><label for="from">From<span class="red">*</span></label><input class="big" type="email"
                        name="From" id="from" placeholder="youremail@example.com" required></div>
                <div class="to"><label for="to">To<span class="red">*</span></label><input type="email" name="To"
                        id="to" class="big" placeholder="theiremail@example.com" required>
                </div>
          
                <div class="cc"><label for="cc">Cc</label><input  class="big"type="email" name="Cc"
                        id="cc" >
                </div>
                <div class="bcc"><label for="bcc">Bcc</label><input type="email" name="Bcc"
                        id="bcc" class="big" >
                </div>
                <div class="subject"><label for="subject">Subject</label><input  type="text" placeholder="Title"
                        name="Subject" class="big" id="subject">
                </div>  
                <div class="body"><label for="body">Body<span class="red">*</span></label> <textarea name="Body"
                        id="body" cols="70" class="big" placeholder="Hello, this is an email" rows="10"></textarea></div>
                <input type="submit" value="Send" name="Send" class="send btn" />
            </form>
        </section>
    </main>


</body>

</html>

<?php

$from = $to = $subject = $message = $cc = $bcc = "";

if(isset($_POST['Send'])){
$from = $_POST['From'];
$to = $_POST['To'];
$subject = $_POST['Subject'];
$message = $_POST['Body'];

if(!($_POST['Cc'])==0){$cc = $_POST['Cc'];}

if(!($_POST['Bcc'])==0){$bcc = $_POST['Bcc'];}

$headers = "From: $from" . "\r\n";
if($cc != ""){$headers .= "Cc: $cc" . "\r\n";}
if($bcc != ""){$headers .= "Bcc: $bcc" . "\r\n";}

mail($to,$subject,$message,$headers);

echo "mail sent";
}


?>