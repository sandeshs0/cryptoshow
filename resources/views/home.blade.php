<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Event Page</title>
    <style>
        {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Roboto, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

    .brand {
        font-size: 24px;
        font-weight: bold;
    }

    .login-btn button {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-btn button:hover {
        background-color: #0056b3;
    }

    .login-btn h3 {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
    }

    .login-btn h3 a {
        color: #E8EFCF;
        text-decoration: none;
    }

    .login-btn h3 a:hover {
        color: #DBAFA0;
    }

        .header {
            background-color: #8B322C;
            color: #fff;
            padding: 20px 0;
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
        }

        .login-btn button {
            background-color: #8576FF;
            border: 1px solid white;
            border-radius:20px;
            padding:2px 10px;
            color: #fff;
            font-weight: bold;
            font-size:20px;
            cursor: pointer;
        }

        .spacer {
            height: 20px;
        }

        .search-bar {
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
        }
        
        .search-icon {
            position: absolute;
            top: 50%;
            right: 0; 
            transform: translateY(-50%);
        }

        .search-icon i {
            color: #ccc;
            font-size: 18px;
        }

        .search-bar input[type="text"] {
            width: 70%;
            padding-left: 30px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;         
        }

        .search-bar button {
            width: 30%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .event-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .event-card {
            width: calc(25% - 20px); 
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .event-card h2 {
            margin-bottom: 10px;
        }

        .event-card p {
            margin-bottom: 15px;
        }

        .event-card button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
     
        @media screen and (max-width: 768px) {
            .search-bar input[type="text"] {
                width: 60%;
            }

            .search-bar button {
                width: 40%;
            }

            .event-card {
                width: calc(50% - 20px); 
            }
        }

        @media screen and (max-width: 480px) {
            .search-bar input[type="text"] {
                width: 100%;
                border-radius: 5px;
            }

            .search-bar button {
                width: 100%;
                border-radius: 5px;
            }

            .event-card {
                width: 100%; 
            }
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
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            animation-name: animatetop;
            animation-duration: 0.4s;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @keyframes animatetop {
            from {top: -300px; opacity: 0}
            to {top: 0; opacity: 1}
        }


    </style>    
</head>
<body>

<header class="header">
    <div class="container">
        <div class="brand">Cryptoshow</div>
        <div class="login-btn" >
        @if(session('user_email'))
        <h3>Hi, <a href="/profile">{{ session('user_email') }}</a></h3>
        @else
        <button onclick="window.location.href = '/login';">Login</button> 
        </div>
    @endif
            
    </div>
</header>

<div class="spacer"></div>

<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Search...">
    </div>
    <div class="event-cards">
    @if($events->isEmpty())
            <p>No events found.</p>
        @else
        @foreach($events as $event)
        <div class="event-card">
            <h2>{{ $event->event_name }}</h2>
            <p>Date: {{ $event->event_date }}</p>
            <p>Event Description goes here...</p>
            <button onclick="openModal('Event Title', 'Event Date', 'Event Description')">Register</button>
        </div>
        @endforeach
        @endif
        <!-- Repeat this event-card structure for each event -->
    </div>
</div>

<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="modal-title">Event Title</h2>
        <p id="modal-date">Date: Event Date</p>
        <p id="modal-description">Event Description goes here...</p>
        <form id="registration-form">
            <!-- Add your registration form fields here -->
            <input type="text" placeholder="Name" required><br><br>
            <input type="email" placeholder="Email" required><br><br>
            <button type="submit">Register</button>
        </form>
    </div>
</div>


<script>
    function openModal(title, date, description) {
        var modal = document.getElementById("myModal");
        var modalTitle = document.getElementById("modal-title");
        var modalDate = document.getElementById("modal-date");
        var modalDescription = document.getElementById("modal-description");

        modal.style.display = "block";
        modalTitle.textContent = title;
        modalDate.textContent = "Date: " + date;
        modalDescription.textContent = description;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    // Handle form submission
    document.getElementById("registration-form").addEventListener("submit", function(event) {
        // Add your registration form submission logic here
        alert("Registration Successful!");
        // Prevent default form submission
        event.preventDefault();
    });
</script>
</body>
</html>
