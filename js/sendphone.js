var myHeaders = new Headers();
myHeaders.append("Authorization", "App 9d0cf043cabf26f838f46cb8b7e8e10c-5913c8a8-ce0d-46ec-98f5-70fec97b89c6");
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Accept", "application/json");

var raw = JSON.stringify({
    "messages": [
        {
            "destinations": [{"to":"66982242536"}],
            "from": "ServiceSMS",
            "text": "Hello,\n\nThis is a test message from Infobip. Have a nice day!"
        }
    ]
});

var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
};

fetch("https://pp1qyv.api.infobip.com/sms/2/text/advanced", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));