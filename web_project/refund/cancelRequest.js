const form = document.getElementById('cancelForm');

form.addEventListener('submit', function(e) {
    e.preventDefault(); // prevent default submission

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const order = document.getElementById('order').value.trim();
    const reason = document.getElementById('reason').value.trim();

    // Basic validation
    if(name.length < 2) {
        alert("Name should be at least 2 characters.");
        return;
    }

    if(!email.includes('@') || !email.includes('.')) {
        alert("Please enter a valid email.");
        return;
    }

    if(order.length < 3) {
        alert("Order Number seems too short.");
        return;
    }

    if(reason.length < 5) {
        alert("Reason should be at least 5 characters.");
        return;
    }

    // If all validation passed
    alert("Your cancellation request has been submitted!");
    form.reset(); // Clear form
});
