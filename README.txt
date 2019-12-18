Method send($data) sends a message to mail or telegram, where parameter $data is an associative array:
$data example for sending to default Telegram bot: @eshop_logs_bot
    $data = array(
        "telegram" => array(
            "message" => "Here we go"
        )
    );
$data example for sending to email:
    $data = array(
        "mail" => array(
            "host" => "smtp.gmail.com",
            "port" => 465,
            "encryption" => "ssl",
            "username" => "*********@gmail.com",
            "password" => "********",
            "subject" => "Awesome subject",
            "fromEmail" => "*********@gmail.com",
            "fromName" => "Max",
            "toEmail" => "*********@gmail.com",
            "toName" => "Me",
            "message" => "Here is my awesome message for myself:)"
        )
    );
