const queues = { VIP: [], Regular: [], Student: [] };

    document.getElementById("waitlistForm").addEventListener("submit", function(event) {
      event.preventDefault();

      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const priority = document.getElementById("priority").value;
      const notify = document.getElementById("notify").checked;
      const messageBox = document.getElementById("message");

      messageBox.innerHTML = "";
      messageBox.className = "message";

      // Simple validation
      if (name.length < 3) {
        messageBox.innerHTML = "❌ Name must be at least 3 characters long.";
        messageBox.classList.add("error");
        return;
      }

      if (!email.includes("@") || !email.includes(".")) {
        messageBox.innerHTML = "❌ Please enter a valid email (must include '@' and '.').";
        messageBox.classList.add("error");
        return;
      }

      if (!priority) {
        messageBox.innerHTML = "❌ Please select a priority level.";
        messageBox.classList.add("error");
        return;
      }

      queues[priority].push({ name, email, notify });
      const position = queues[priority].length;

      messageBox.innerHTML = `✅ Successfully joined as <b>${priority}</b>. Your position: ${position}.`;
      messageBox.classList.add("success");

      document.getElementById("waitlistForm").reset();
    });
