document.getElementById("cancelForm").addEventListener("submit", function(e){
    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let order = document.getElementById("order").value.trim();
    let reason = document.getElementById("reason").value.trim();

    if(name === ""){
        alert("Name is required!");
        return;
    }

    if(email === "" || !email.includes("@")){
        alert("Valid email is required!");
        return;
    }

    if(order === ""){
        alert("Order Number is required!");
        return;
    }

    if(reason === ""){
        alert("Reason for cancellation is required!");
        return;
    }

    alert("Form submitted successfully!");
    document.getElementById("cancelForm").reset();
});
