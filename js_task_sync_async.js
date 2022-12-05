let x = 20;

function msg1() {
    console.log("Test 1");
}

function msg2() {
    let p = new Promise(function(res) {
        setTimeout(function() { console.log("Test 2"); x = 30; res(msg3); }, 3000);
      });
    return p;
}

function msg3() {
    console.log("Test 3");
    console.log(x);
}

msg1();
msg2().then(function(value) {
    value();
})