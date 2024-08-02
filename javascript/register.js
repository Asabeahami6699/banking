// Get the popup element
var popup = document.getElementById("popupForm");

// Get the open and close buttons
var openBtn = document.getElementById("openFormBtn");
var closeBtn = document.getElementById("closeFormBtn");

// Open the popup
openBtn.onclick = function() {
    popup.style.display = "block";
}

// Close the popup
closeBtn.onclick = function() {
    popup.style.display = "none";
}

// Close the popup when clicking outside the content
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

// Show/hide role-specific fields based on role selection
function toggleRoleFields() {
    const role = document.getElementById('role').value;
    const branchField = document.getElementById('branchField');
    const tellerField = document.getElementById('tellerField');

    if (role === 'teller' || role === 'customer_service') {
        branchField.style.display = 'block';
    } else {
        branchField.style.display = 'none';
        tellerField.style.display = 'none';
    }

    if (role === 'teller') {
        tellerField.style.display = 'block';
    } else {
        tellerField.style.display = 'none';
    }
}

function updateTellerTypes() {
    const branch = document.getElementById('branch_name').value;
    const tellerTypeSelect = document.getElementById('teller_type');

    let options = '';

    if (branch === 'aiyinasi') {
        options = '<option value="aiyinasi teller1">aiyinasi teller1</option><option value="aiyinasi teller2">aiyinasi teller2</option>';
    } else if (branch === 'bogoso') {
        options = '<option value="bogoso teller1">bogoso teller1</option><option value="bogoso teller2">bogoso teller2</option>';
    } else if (branch === 'prestea') {
        options = '<option value="prestea teller1">prestea teller1</option><option value="prestea teller2">prestea teller2</option>';
    }

    tellerTypeSelect.innerHTML = options;
}

