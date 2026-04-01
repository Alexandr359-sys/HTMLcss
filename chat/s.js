const PHP_URL = 'http://localhost/d.php';
const POLL_MS = 2000;
 
let lastTimestamp =  '';
let pollTimer = null;
let totalReceived= 0;
let totalSent = 0;
let currentChat = '';
let currentUser = '';
 
const $ = id => document.getElementById(id);
 
const messagesEl = $('messages');
const usernameEl = $('username');
const chatnameEl = $('roomname');
const msgInputEl = $('msgInput');
const lastPollEl = $('lastPoll');
const button = $('sendBtn');

button?.addEventListener('click', sendMsg);

function sendMsg()
{
    let msg = msgInputEl.value;
    console.log("odesílání: ", msg);

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function()
    {
        if (this.readyState==4 && this.responseText==200)
            crossOriginIsolated.log("server: ", this.readyText);
        else console.log("chyba");
    }
    xhttp.open("GET", PHP_URL+"?vote="+msg);
    xhttp.setRequestHeader('Access-Control-Allow-Origin', '*');
    xhttp.send();
}