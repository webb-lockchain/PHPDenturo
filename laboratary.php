<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial;
    }

    .form-container {
        width: 100%;
        padding: 10px;
        background-color: white;
    }

    #drop_file_zone {
        background-color: #EEE;
        border: #999 5px dashed;
        width: 100%;
        height: 200px;
        padding: 8px;
        margin-bottom: 30px;
        font-size: 18px;
    }

    #drag_upload_file {
        width: 50%;
        margin: 0 auto;
    }

    #drag_upload_file p {
        text-align: center;
    }

    #drag_upload_file #selectfile {
        display: none;
    }

    /* Full-width textarea */
    .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: 1px solid gray;
        background: #f1f1f1;
        resize: none;
        min-height: 50px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }


    /* Full-width textarea */
    .form-container input {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: 1px solid gray;
        background: #f1f1f1;
        resize: none;
        min-height: 50px;
    }

    /* When the textarea gets focus, do something */
    .form-container input:focus {
        background-color: #ddd;
        outline: none;
    }




    #drop_zone {
        /* border: 5px solid blue; */
        width: 100%;
        background: #f1f1f1;
        margin: 5px 0 22px 0;
        height: 200px;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        /* width: 100%; */
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .image-container img {
        width: 50px;
        height: 50px;
        border: 1px solid black;
        margin: 5px;
    }

    .image-container button {
        position: absolute;
        top: -10px;
        /* Adjust the top position as needed */
        right: -10px;
        /* Adjust the right position as needed */
        background: none;
        border: none;
        cursor: pointer;
        color: red;
        /* Change the color of the cancel icon as needed */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    .w3-modal-content {
        max-width: 650px !important;
    }

    .w3-container {
        padding: 0.01em 30px !important
    }

    .detail-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 99;
        width: 300px;
    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        background-color: #f1f1f1;
    }

    .box {
        float: right;
        overflow: hidden;
        background: #f0e68c;
    }

    /* Add padding and border to inner content
    for better animation effect */
    .box-inner {
        padding: 10px;
        border: 1px solid #a29415;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    .container {
        position: relative;
    }

    .containerbackground {
        margin: 3rem;
        position: absolute;
        /* top: 0;
        left: 0;
        bottom: 0; */
        z-index: -1;
        transform: rotate(300deg);
        -webkit-transform: rotate(300deg);
        color: #c6afaf;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        border-top: none;
    }

    .accordion {
        border: none;
        outline: none;
        font-size: 15px;
        transition: 0.8s;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .accordion:active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    <div class="mt-20 w-full mx-4 md:w-3/5 md:mx-auto">
        <h2 class="text-bold text-6xl" style="font-family: Raleway,sans-serif !important; font-weight: bold;!important">
            Uploaded data</h2>
        <p class="mt-8">You can check all data from users and dentists</p>

        <div class="tab mt-6 mb-4">
            <button class="tablinks" onclick="openCity(event, 'Dentists')">Dentists</button>
            <button class="tablinks" onclick="openCity(event, 'Users')">Users</button>
        </div>

        <div id="Dentists" class="tabcontent">
            <div class="w-full flex flex-col gap-8">
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div id="receivedquote" onclick="viewinfo(1)"
                        class=" text-3xl hover:cursor-pointer flex justify-between ">
                        <span>Received new quotes (<span id='rnqcount'></span>)</span>
                        <div id="exp1">-</div>
                    </div>

                    <div id="viewnewquote" class="flex flex-col w-full gap-4">
                    </div>
                </div>
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div id="checkingquote" onclick="viewinfo(2)"
                        class="text-3xl hover:cursor-pointer flex justify-between">
                        <span>Checking quotes (<span id='cqcount'></span>)</span>
                        <div id="exp2">-</div>
                    </div>
                    <div id="viewcheckingquote" class="panel mt-6 flex flex-col w-full gap-4">
                    </div>
                </div>
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div id="sentoffers" onclick="viewinfo(3)"
                        class="text-3xl hover:cursor-pointer flex justify-between">
                        <span>Sent offers (<span id="socount"></span>)</span>
                        <div id="exp3">-</div>
                    </div>
                    <div id="viewsentoffers" class="panel mt-6 flex flex-col w-full gap-4">

                    </div>
                </div>
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div id="sentoffers" onclick="viewinfo(4)"
                        class="text-3xl hover:cursor-pointer flex justify-between">
                        <span>Received new orders (<span id="rnocount"></span>)</span>
                        <div id="exp4">-</div>
                    </div>
                    <div id="vieworders" class="panel mt-6 flex flex-col w-full gap-4">

                    </div>
                </div>
            </div>
        </div>

        <div id="Users" class="tabcontent">
            <div class="w-full flex flex-col gap-8">
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div class="text-3xl hover:cursor-pointer flex justify-between accordion">
                        Received new quotes (2)
                    </div>
                    <div class="panel mt-6 flex flex-col w-full gap-4">
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center border-b-2 border-gray-200 py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="mt-2 sm:mt-0 w-full sm:w-6/12 underline text-green-500">This is the test
                                data.
                                For more
                                detail, you can
                                check this link.</div>
                            <div class="mt-2 sm:mt-0 w-full sm:w-2/12">Bidden</div>
                        </div>
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="w-full sm:w-6/12 underline text-green-500">This is the test data. For
                                more
                                detail, you can
                                check this link.</div>
                            <div class="w-full sm:w-2/12">Bidden</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div class="text-3xl hover:cursor-pointer flex justify-between accordion">
                        Checking quotes (3)
                    </div>
                    <div class="panel mt-6 flex flex-col w-full gap-4">
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center border-b-2 border-gray-200 py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="mt-2 sm:mt-0 w-full sm:w-6/12 underline text-green-500">This is the test
                                data.
                                For more
                                detail, you can
                                check this link.</div>
                            <div class="mt-2 sm:mt-0 w-full sm:w-2/12">Bidden</div>
                        </div>
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center border-b-2 border-gray-200 py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="w-full sm:w-6/12 underline text-green-500">This is the test data. For
                                more
                                detail, you can
                                check this link.</div>
                            <div class="w-full sm:w-2/12">Bidden</div>
                        </div>
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center  py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="w-full sm:w-6/12 underline text-green-500">This is the test data. For
                                more
                                detail, you can
                                check this link.</div>
                            <div class="w-full sm:w-2/12">Bidden</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-full border-2 border-gray-200 rounded-xl p-6">
                    <div class="text-3xl hover:cursor-pointer flex justify-between accordion">
                        Sent offers (2)
                    </div>
                    <div class="panel mt-6 flex flex-col w-full gap-4">
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center border-b-2 border-gray-200 py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="mt-2 sm:mt-0 w-full sm:w-6/12 underline text-green-500">This is the test
                                data.
                                For more
                                detail, you can
                                check this link.</div>
                            <div class="mt-2 sm:mt-0 w-full sm:w-2/12">Bidden</div>
                        </div>
                        <div
                            class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center py-4">
                            <div class="w-full sm:w-2/12 flex flex-col">
                                <div class="text-lg">Feb29, 2024</div>
                                <div class="text-sm">4 days ago</div>
                            </div>
                            <div class="w-full sm:w-6/12 underline text-green-500">This is the test data. For
                                more
                                detail, you can
                                check this link.</div>
                            <div class="w-full sm:w-2/12">Bidden</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div id="detail-popup" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <div class=" w3-display-topright">
                    <span><a href="https://run.briskinvoicing.com/help/quotes_help.html"
                            class="underline">Help</a></span>

                    <span onclick="document.getElementById('detail-popup').style.display='none'"
                        class="w3-button">&times;</span>
                </div>


                <form action="/quoteforpat.php" class="form-container" method="POST" enctype="multipart/form-data"
                    id="quoteForm">

                    <a href="index.php" aria-current="page" class="logo w-inline-block"><img
                            src="images/DenturoLogo.png" alt="Logo" loading="lazy"
                            class=" mt-8 logo-img  w-20 h-20"></a>
                    <h1 class="mt-8 mb-6 text-center text-3xl md:text-6xl" style="font-family: Raleway,sans-serif !important;
        font-weight: bold;!important">Requested quote from user</h1>

                    <div id="viewdetail">
                    </div>

                    <div class="mt-12"></div>
                    <label for="fullName"><b id="offerviewer">Write down to user</b></label>
                    <div class="w-full p-8 rounded-xl border-2 border-gray-300">
                        <label for="message"><b>Message</b></label>
                        <textarea placeholder="Enter your message" name="message" id="messageTextarea"
                            required></textarea>
                        <label for="message"><b>File list</b></label>

                        <div id="drop_file_zone" ondrop="dropHandler(event)" ondragover="dragoverHandler(event)"
                            class="hover:cursor-pointer h-fit flex flex-wrap gap-2 justify-center items-center">
                            <ul id="file_list" class="flex flex-row flex-wrap gap-2"></ul>
                        </div>
                        <div id="offerfilelist" class="w-full p-6 border-[1px] border-gray-500 flex justify-center">
                        </div>
                    </div>

                    <div class="mt-20 w-full sm:w-2/3 mx-auto">
                        <div class="flex flex-row justify-between">

                            <button type="button" class="btn w-2/5 aa send" onclick="uploadSelectedFiles()">
                                <div id="sending"></div>
                                <!-- <img src="images/icons/loading.gif" class="w-8 h-8 z-20"/> -->
                            </button>

                            <button type="button" class="btn w-2/5 cancel aa"
                                onclick="document.getElementById('detail-popup').style.display='none'">Close</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
    var docId;

    function
    uploadSelectedFiles() {
        const form = document.getElementById('quoteForm');
        // const fileInput = document.getElementById('selectfile');
        // const files = fileInput.files;
        const files = droppedFiles;

        var messageTextarea = document.getElementById('messageTextarea');
        if (messageTextarea.value.trim() === '') {
            alert('Please enter your message');
            messageTextarea.focus(); // Set focus to the full name input field
            return false; // Prevent form submission
        }
        document.getElementById("sending").innerHTML =
            '<img src="images/icons/loading.gif" class="mx-auto w-8 h-8 z-20"/>';
        if (files.length > 0) {
            const formData = new FormData(form);
            formData.append('message', document.querySelector('textarea[name="message"]').value);
            formData.append('position', localStorage.getItem("position"));
            formData.append('detailid', docId);
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                if (file.type === "image/jpeg" || file.type === "image/jpg" || file.type === "application/msword" ||
                    file
                    .type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    if (file.size <= 2 * 1024 * 1024) {
                        formData.append('files[]', file);
                    } else {
                        alert('File size exceeds 10MB limit:    ' + file.name);
                        return; // Stop further processing if file size exceeds the limit
                    }
                } else {
                    alert('Invalid file type:    ' + file.name);
                    return; // Stop further processing if file type is invalid
                }
            }
            $.ajax({
                type: "POST",
                url: "getview.php",
                data: formData,
                processData: false, // Prevent jQuery from automatically processing the data
                contentType: false, // Set content type to false for FormData
                success: function(data) {
                    so = JSON.parse(data);
                    requestcq();
                    refresh('so');
                    document.getElementById('detail-popup').style.display = 'none'
                }
            });
        }
    }


    let droppedFiles = [];

    function dragoverHandler(ev) {
        ev.preventDefault();
        ev.dataTransfer.dropEffect = "move";
    }

    function dragStartHandler(ev) {
        ev.preventDefault(0);
        const sourceImage = ev.target;

        // Check if the dragged item is an image file
        if (sourceImage.src.toLowerCase().match(/\.(jpg|jpeg|png|gif)$/)) {
            // Set the data to transfer
            ev.dataTransfer.setData("text/plain", "image"); // Set a data type to identify it as an image file
        } else if (sourceImage.src.toLowerCase().match(/\.(doc|docx|pdf)$/)) {
            // Set the data to transfer
            ev.dataTransfer.setData("text/plain", "document"); // Set a data type to identify it as a document file
        } else {
            // Set a default drag image for other file types
            ev.dataTransfer.setData("text/plain", "other"); // Set a data type to identify it as another file type
        }
    }
    var i = 0;

    function dropHandler(ev) {
        ev.preventDefault();
        if (i < 3) {
            files = null;
            // Access the data type set in the dragStartHandler
            const dataType = ev.dataTransfer.getData("text/plain");

            // Create a new container with flex properties
            const flexContainer = document.createElement("div");
            flexContainer.className = "flex justify-center items-center"; // Add flex properties

            // Create a flex column container
            const flexColumn = document.createElement("div");
            flexColumn.className = "flex flex-col items-center"; // Add flex column properties

            // Create the image container
            const smallImage = document.createElement("div");
            smallImage.className = "image-container"; // Add a class to the image container for styling
            const imageElement = document.createElement("img");
            if (dataType === "image") {
                imageElement.src = "img.png"; // Show img.png for image files
            } else if (dataType === "document") {
                imageElement.src = "doc.png"; // Show doc.png for document files
            } else {
                // Handle other file types
                // For example, you can set a default image or handle them differently
                imageElement.src = "doc.png"; // Show a default image for other file types
            }
            imageElement.style.width = "50px"; // Set the width of the small image
            imageElement.style.height = "50px"; // Set the height of the small image
            imageElement.style.border = "1px solid black"; // Add a border to the small image
            imageElement.style.margin = "5px"; // Add some margin to the small image

            // Create a "cancel" button for removing the image
            const cancelButton = document.createElement("button");
            cancelButton.innerHTML = '<i class="fas closed fa-times"></i>'; // Use the Font Awesome cancel icon
            cancelButton.addEventListener("click", function() {
                flexColumn.remove(); // Remove the flex column when the "cancel" button is clicked
                i = i - 1;
                console.log(flexColumn)
                // Get the file name from the File object
                const fileName = document.createElement("div");
                console.log(fullFileName)
                const file = event.dataTransfer.files[0]; // Assuming only one file is dropped
                const fullFileName = file.name;
                console.log(droppedFiles);
                // Find the index of the file in the droppedFiles array
                const droppedFiles = droppedFiles.filter(file => file.name !== fileName);
                console.log(droppedFiles);

            });

            i = i + 1;
            // Append the image and the "cancel" button to the image container
            smallImage.appendChild(imageElement);
            smallImage.appendChild(cancelButton);

            // Append the image container to the flex column
            flexColumn.appendChild(smallImage);

            // Get the file name from the File object
            const fileName = document.createElement("div");
            const file = event.dataTransfer.files[0]; // Assuming only one file is dropped
            const fullFileName = file.name;
            const shortFileName = fullFileName.substring(0, 6); // Get the first 4 characters of the file name
            fileName.textContent = shortFileName; // Set the short file name
            fileName.title = fullFileName; // Set the full file name as the title for hover

            // Add a class to style the file name
            fileName.className = "file-name text-center";

            // Add a hover effect using CSS
            fileName.style.cursor = "pointer"; // Change cursor to pointer on hover
            fileName.style.textDecoration = "underline"; // Underline the text on hover

            // Show the full file name on hover
            fileName.addEventListener("mouseover", function() {
                fileName.textContent = fullFileName; // Show the full file name on hover
            });

            // Show the short file name on mouseout
            fileName.addEventListener("mouseout", function() {
                fileName.textContent = shortFileName; // Show the short file name on mouseout
            });

            // Append the file name to the flex column
            flexColumn.appendChild(fileName);

            // Append the flex column to the flex container
            flexContainer.appendChild(flexColumn);

            // Append the flex container to the drop target
            ev.target.appendChild(flexContainer);

            // files = event.dataTransfer.files;
            // droppedFiles = Array.from(files);

            droppedFiles.push(file);
            // Handle the dropped files
            console.log(files);
        } else alert("You can attach less than 3 files. ")
    }


    function createview(role) {
        if (role == "Dentists") {
            viewdata("rnq", role);
            viewdata("cq", role);
            viewdata("so", role);
            viewdata("rno", role);
        } else if (role == "Users") {

        }

    }

    function viewdata(position, role) {
        $.ajax({
            type: 'POST',
            url: 'getview.php',
            data: {
                user: userid,
                position: position,
                role: role
            },
            success: function(response) {
                if (response == 'success') {
                    // Close the login modal
                    document.getElementById('offer-popup')
                        .style.display = 'none'
                    window.location.href =
                        "fur-zahnarzte.php";
                    // $('.offer-popup').hide();
                }
            }
        });
    }

    var rnq = [];
    var cq = [];
    var so = [];

    function requestrnq() {
        $.ajax({
            type: "GET",
            url: "getview.php",
            data: {
                where: "rnq"
            },
            success: function(data) {
                rnq = JSON.parse(data);
                refresh('rnq');
            }
        });
    }

    function requestcq() {
        $.ajax({
            type: "GET",
            url: "getview.php",
            data: {
                where: "cq"
            },
            success: function(data) {
                cq = JSON.parse(data);
                refresh('cq');
            }
        });
    }

    function requestso() {
        $.ajax({
            type: "GET",
            url: "getview.php",
            data: {
                where: "so"
            },
            success: function(data) {
                so = JSON.parse(data);
                refresh('cq');
                if (so.length != 0) refresh('so');
            }
        });
    }
    requestrnq();
    requestcq();
    requestso();

    var rno = [{
            created: "Mar29, 2024",
            passed: "2 days ago",
            msg: "RNO!I am checking quotes.",
            writer: "Hamilton",
            id: 3
        },
        {
            created: "Mar28, 2024",
            passed: "3 days ago",
            msg: "Second checking quotes are ok.",
            writer: "Evan",
            id: 4
        },
        {
            created: "Mar20, 2024",
            passed: "11 days ago",
            msg: "Who are you?",
            writer: "Deandre",
            id: 5
        },
        {
            created: "Mar19, 2024",
            passed: "12 days ago",
            msg: "You are the top",
            writer: "Jones",
            id: 6
        },
        {
            created: "Mar20, 2024",
            passed: "11 days ago",
            msg: "Who are you?",
            writer: "Deandre",
            id: 5
        },
        {
            created: "Mar19, 2024",
            passed: "12 days ago",
            msg: "You are the top",
            writer: "Jones",
            id: 6
        }
    ];

    function details(id) {
        document.getElementById("sending").innerHTML = "Send";
        docId = id;
        $.ajax({
            type: "GET",
            url: "getview.php",
            data: {
                where: "id_" + id
            },
            success: function(data) {
                var temp = JSON.parse(JSON.parse(data));

                detail = {
                    userfile: temp.userfile,
                    id: temp.quote.id,
                    usermsg: temp.quote.usermsg,
                    user: {
                        fname: temp.quote.fname,
                        email: temp.quote.email,
                        phone: temp.quote.phone,
                        address: temp.quote.address
                    }
                };
                var filetag = '';
                for (let i = 0; i < detail.userfile.length; i++) {
                    filetag = filetag + '<a href=' + '"' + detail.userfile[i]
                        .url + '"' + 'class="underline text-blue-500 hover:text-blue-400" download>' +
                        detail.userfile[i]
                        .orgname + '</a>';
                }
                document.getElementById('detail-popup').style.display = 'block';
                document.getElementById('viewdetail').innerHTML =
                    '<div class="flex flex-row justify-end mb-8"><div><b>quoteID:</b>&nbsp;' + detail
                    .id +
                    '</div></div><label for="fullName"><b>From User</b></label><div class="w-full p-8 rounded-xl border-2 border-gray-300 "><div class="flex flex-row justify-between"><label for="fullName"><b>User info</b></label> <div id="showoption"  class="underline text-blue-500 hover:cursor-pointer hover:text-blue-400"  onclick="visible()"></div></div><div id="contactinfo" class="grid grid-cols-1 sm:grid-cols-2 gap-2 p-6 border-[1px] border-gray-500 mb-8"><div class="flex flex-row"><div class="font-bold">Full Name:</div><div class="break-all">&nbsp;' +
                    detail.user.fname +
                    '</div></div><div class="flex flex-row"><div class="font-bold">Email:</div><div class="break-all">&nbsp;' +
                    detail.user
                    .email +
                    '</div></div> <div class="flex flex-row"><div class="font-bold">Phone:</div><div class="break-all">&nbsp;' +
                    detail
                    .user.phone +
                    '</div></div> <div class="flex flex-row"><div class="font-bold">Address:</div><div class="break-all">&nbsp;' +
                    detail.user.address +
                    '</div></div><div class="flex flex-row"><div class="font-bold">Actions:</div><div>&nbsp;' +
                    detail.user
                    .actions +
                    '</div></div></div><div class="flex flex-row justify-between"><label class="" for="message"><b>Message</b></label><div id="showoptionM" class=" underline text-blue-500 hover:cursor-pointer hover:text-blue-400" onclick="visibleM()"></div></div><div id="contactinfoM" class="p-6 border-[1px] border-gray-500 mb-8">' +
                    detail.usermsg +
                    '</div><div class="flex flex-row justify-between"><label for="message"><b>File list</b></label><div id="showoptionF"  class="underline text-blue-500 hover:cursor-pointer hover:text-blue-400" onclick="visibleF()"></div></div><div id="contactinfoF" class="w-full p-6 border-[1px] border-gray-500 flex justify-center"><div class="grid grid-cols-1 sm:grid-cols-2 gap-6"> ' +
                    filetag + '</div></div >';
                visibleini = 1;
                document.getElementById('showoption').innerHTML = 'Hide';

                visibleiniM = 1;
                document.getElementById('showoptionM').innerHTML = 'Hide';

                visibleiniF = 1;
                document.getElementById('showoptionF').innerHTML = 'Hide';
                if (id.search("o_") >= 0) {
                    document.getElementById('offerviewer').innerHTML = 'Sent offer to user';
                    document.getElementById('messageTextarea').innerHTML = temp.offermsg.msg;
                    document.getElementById('messageTextarea').disabled = true;
                    document.getElementById('drop_file_zone').style.display = 'none';

                    var filetag = '';
                    for (let i = 0; i < temp.offerfilelistData.length; i++) {
                        filetag = filetag + '<a href=' + '"' + detail.userfile[i]
                            .url + '"' + 'class="underline text-blue-500 hover:text-blue-400" download>' +
                            detail.userfile[i]
                            .orgname + '</a>';
                    }
                    filetag = '<div class="grid grid-cols-1 sm:grid-cols-2 gap-6"> ' + filetag + '</div>';
                    document.getElementById('offerfilelist').innerHTML = filetag;
                    document.getElementById('offerfilelist').style.display = 'flex';
                    console.log(temp);
                } else {
                    document.getElementById('offerviewer').innerHTML = 'Write down to user';
                    document.getElementById('offerfilelist').style.display = 'none';
                    document.getElementById('messageTextarea').innerHTML = ""
                    document.getElementById('messageTextarea').disabled = false;
                    document.getElementById('drop_file_zone').style.display = 'block';
                }
                requestrnq();
                requestcq();
            }
        });

    }

    function refresh(id) {
        let target = {
            tag: '',
            counts: 0,
            list: []
        }
        if (id == 'rnq') {
            target.list = rnq;
            target.counts = 'rnqcount';
            target.tag = 'viewnewquote';
        } else if (id == 'cq') {
            target.list = cq;
            target.counts = 'cqcount';
            target.tag = 'viewcheckingquote';
        } else if (id == 'so') {
            target.list = so;
            target.counts = 'socount';
            target.tag = 'viewsentoffers';
        } else if (id == 'rno') {
            target.list = rno;
            target.counts = 'rnocount';
            target.tag = 'vieworders';
        }
        if (target.list.length != 0) {
            var rnqtag = '<div onclick="details(' + "'" + target.list[0].id + "'" +
                ')"class="mt-6 hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center border-b-2 border-gray-200 py-4"><div class="w-full sm:w-2/12 flex flex-col"><div class="text-lg">' +
                target.list[0].created +
                '</div><div class="text-sm">' + target.list[0].passed + " ago" +
                '</div></div><div class="mt-2 sm:mt-0 w-full sm:w-6/12 underline text-green-500">' + target.list[0]
                .msg +
                '</div><div class="mt-2 sm:mt-0 w-full sm:w-2/12">' + target.list[0].writer +
                '</div></div>';
            for (let i = 1; i < target.list.length - 1; i++) {
                rnqtag = rnqtag +
                    '<div onclick="details(' + "'" + target.list[i].id + "'" +
                    ')" class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center border-b-2 border-gray-200 py-4"> <div class="w-full sm:w-2/12 flex flex-col"> <div class="text-lg">' +
                    target.list[i].created +
                    '</div> <div class="text-sm">' + target.list[i].passed + " ago" +
                    '</div> </div><div class="w-full sm:w-6/12 underline text-green-500">' + target.list[i].msg +
                    '</div> <div class="w-full sm:w-2/12">' + target.list[i].writer +
                    '</div> </div>';
            }
            if (target.list.length > 1) {
                rnqtag = rnqtag +
                    '<div  onclick="details(' + "'" + target.list[target.list.length - 1].id + "'" +
                    ')" class="hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between items-center py-4"><div class="w-full sm:w-2/12 flex flex-col"><div class="text-lg">' +
                    target.list[target.list.length - 1].created +
                    '</div><div class="text-sm">' + target.list[target.list.length - 1].passed + " ago" +
                    '</div></div><div class="w-full sm:w-6/12 underline text-green-500">' + target.list[target.list
                        .length -
                        1]
                    .msg +
                    '</div> <div class="w-full sm:w-2/12">' + target.list[target.list.length - 1].writer +
                    '</div></div>';
            }

            document.getElementById(target.tag).innerHTML = rnqtag;
            document.getElementById(target.counts).innerHTML = target.list.length;
        } else {
            document.getElementById(target.tag).innerHTML = '';
            document.getElementById(target.counts).innerHTML = 0;
        }

    }

    // refresh('so');
    // refresh('rno');

    function visible() {
        if (visibleini == 1) {
            visibleini = 2;
            document.getElementById('showoption').innerHTML = 'Show';
            document.getElementById('contactinfo').style.display = 'none';
        } else {
            visibleini = 1;
            document.getElementById('showoption').innerHTML = 'Hide';
            document.getElementById('contactinfo').style.display = 'block';
        }
    }

    function visibleM() {
        if (visibleiniM == 1) {
            visibleiniM = 2;
            document.getElementById('showoptionM').innerHTML = 'Show';
            document.getElementById('contactinfoM').style.display = 'none';
        } else {
            visibleiniM = 1;
            document.getElementById('showoptionM').innerHTML = 'Hide';
            document.getElementById('contactinfoM').style.display = 'block';
        }
    }

    function visibleF() {
        if (visibleiniF == 1) {
            visibleiniF = 2;
            document.getElementById('showoptionF').innerHTML = 'Show';
            document.getElementById('contactinfoF').style.display = 'none';
        } else {
            visibleiniF = 1;
            document.getElementById('showoptionF').innerHTML = 'Hide';
            document.getElementById('contactinfoF').style.display = 'block';
        }
    }

    function upload_file(event) {
        event.preventDefault();
        var files = event.dataTransfer.files;
        var file_list = document.getElementById('file_list');

        file_list.innerHTML = ''; // Clear previous file list

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var file_item = document.createElement('li');
            file_item.textContent = file.name;
            file_list.appendChild(file_item);
        }

        // Dynamically set the height of the drag_upload_file container based on the file list height
        var dragUploadFile = document.getElementById('drag_upload_file');
        var fileListHeight = file_list.offsetHeight;
        dragUploadFile.style.height = fileListHeight + 'px';
    }

    function file_explorer() {
        // Add your file exploration logic here
        // For example, you can trigger a click event on the file input element
        document.getElementById('selectfile').click();
    }

    function viewinfo(id) {
        var x;
        switch (id) {
            case 1:
                x = document.getElementById("viewnewquote");
                break;
            case 2:
                x = document.getElementById("viewcheckingquote");
                break;
            case 3:
                x = document.getElementById("viewsentoffers");
                break;
            case 4:
                x = document.getElementById("vieworders");
                break;
        }
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById("exp" + id).innerHTML = "-";
        } else {
            x.style.display = "none";
            document.getElementById("exp" + id).innerHTML = "+";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Call the openCity function with 'Dentists' as the cityName parameter
        openCity(event, 'Dentists');
    });

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            if (tablinks[i].firstChild.data == cityName) {
                // tablinks[i].className = tablinks[i].className.replace(" active", "");
                tablinks[i].className = "tablinks active";
            } else tablinks[i].className = "tablinks"
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

</body>

</html>