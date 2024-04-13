<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            display: relative;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 5px;
        }

        .container {
            position: relative;
            max-width: 1200px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile {
            display: flex;
            flex-direction: column;
            
            align-items: center;
            margin-bottom: 30px;
        }

        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
            margin-bottom: 20px;
            
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            margin: 0;
            padding: 0;
            font-size: 24px;
            color: #333;
        }

        .profile-info p {
            margin: 5px 0;
            color: #666;
        }

        .devices {
            margin-top: 20px;
        }

        .device {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .edit-device-button, .delete-device-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }


        .add-device-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
        }

        .add-device-button:hover {
            background-color: #0056b3;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        form .logout-button {
            position: absolute;
            top: 20px; 
            right: 20px; 
            background-color: #000;
            color: #fff;
            padding: 10px 5px;
            width: 90px;
            font-weight:bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-device-button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        

    </style>
</head>
<body>

@if(session('user_email'))
    <div class="container">
    
        <div class="profile">
            <img src="https://i.postimg.cc/5t24cPDP/image.png" alt="Profile Picture">
            <div class="profile-info">
                <h2>User Name</h2>
                <p>Email: {{ session('user_email') }}</p>
                <p>Addres: Nepal</p>
            </div>
            <button class="edit-profile-button">Edit Profile</button>
        </div>


        <div class="devices">
            <h2>My Devices</h2>
            <div class="device">
                <span>Device 1</span>
                
                <div>
                    <button class="edit-device-button">Edit</button>
                    <button class="delete-device-button">Delete</button>
                </div>
            </div>
            <div class="device">
                <span>Device 2</span>
                <div>
                    <button class="edit-device-button">Edit</button>
                    <button class="delete-device-button">Delete</button>
                </div>
            </div>
            <button class="add-device-button">Add Device</button>
        </div>
        <form action="{{ route('logout') }}" method="post">
    @csrf
    <button class="logout-button" type="submit" ><i class="fas fa-sign-out-alt"></i>  Logout</button>
</form>
    </div>

    <!-- Add this modal HTML structure -->
    <div id="editDeviceModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Device</h2>
            <form id="editDeviceForm">
                <label for="editDeviceName">Device Name:</label>
                <input type="text" id="editDeviceName" name="editDeviceName" required>
                <br>
                <label for="editDeviceDescription">Device Description:</label>
                <textarea id="editDeviceDescription" name="editDeviceDescription" rows="2" required></textarea>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Profile</h2>
            <form id="editProfileForm">
                <label for="userName">User Name:</label>
                <input type="text" id="userName" name="userName" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>


    <div id="addDeviceModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Device</h2>
            <form id="addDeviceForm">
                <label for="deviceName">Device Name:</label>
                <input type="text" id="deviceName" name="deviceName" required>
                <br>
                <label for="deviceDescription">Device Description:</label>
                <textarea id="deviceDescription" name="deviceDescription" rows="2" required></textarea>
                <br>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

    <div> 
        <button onclick="window.location.href = 'index.php';">Go to Dashboard</button>
    </div>

@endif
<script>

    function logout() {
        window.location.href = 'login.php';
    }


    var modal = document.getElementById('addDeviceModal');

    var btn = document.querySelector('.add-device-button');

    var span = document.getElementsByClassName('close')[0];

    btn.onclick = function() {
        modal.style.display = 'block';
    };

    span.onclick = function() {
        modal.style.display = 'none';
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    var form = document.getElementById('addDeviceForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        console.log('Form submitted');
    });

   
    // Logout function remains the same as provided in your code

    // Modal functionality for adding a new device remains the same as provided in your code

    // Modal for editing profile
    var editProfileModal = document.getElementById('editProfileModal');
    var editProfileButton = document.querySelector('.edit-profile-button');
    var closeEditProfileButton = editProfileModal.querySelector('.close');

    editProfileButton.onclick = function() {
        editProfileModal.style.display = 'block';
        // Populate the form with existing profile information
        var userNameInput = editProfileModal.querySelector('#userName');
        var emailInput = editProfileModal.querySelector('#email');
        var addressInput = editProfileModal.querySelector('#address');
        // Set default values (replace with actual values)
        userNameInput.value = 'User Name';
        emailInput.value = 'hello@gmail.com';
        addressInput.value = 'Nepal';
    };

    closeEditProfileButton.onclick = function() {
        editProfileModal.style.display = 'none';
    };

    window.onclick = function(event) {
        if (event.target == editProfileModal) {
            editProfileModal.style.display = 'none';
        }
    };

    // Handle form submission for editing profile
    var editProfileForm = document.getElementById('editProfileForm');
    editProfileForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Implement logic to update profile information
        alert('Profile updated successfully!');
        editProfileModal.style.display = 'none';
    });



        // Add this JavaScript code
    

</script>

</body>
</html>
