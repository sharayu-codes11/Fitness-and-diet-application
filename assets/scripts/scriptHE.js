document.addEventListener("DOMContentLoaded", function() {
    const exerciseOptions = document.querySelectorAll(".exercise-option");
    const videoContainer = document.getElementById("video-container");
    const defaultMessage = document.getElementById("default-message");

    // Video data for each option
    const videoBasePath = "assets/e_video/"; // Folder where your videos are stored
    const videoData = {
        option1: [videoBasePath + "video1.mp4", videoBasePath + "video2.mp4", videoBasePath + "video3.mp4", videoBasePath + "video4.mp4", videoBasePath + "video5.mp4"],
        option2: [videoBasePath + "video6.mp4", videoBasePath + "video7.mp4", videoBasePath + "video8.mp4", videoBasePath + "video9.mp4", videoBasePath + "video10.mp4"],
        option3: [videoBasePath + "video11.mp4", videoBasePath + "video12.mp4", videoBasePath + "video13.mp4", videoBasePath + "video14.mp4", videoBasePath + "video15.mp4"],
        option4: [videoBasePath + "video16.mp4", videoBasePath + "video17.mp4", videoBasePath + "video18.mp4", videoBasePath + "video19.mp4", videoBasePath + "video20.mp4"],
        option5: [videoBasePath + "video21.mp4", videoBasePath + "video22.mp4", videoBasePath + "video23.mp4", videoBasePath + "video24.mp4", videoBasePath + "video25.mp4"]
    };
    

    // Function to update videos
    function updateVideos(option) {
        videoContainer.innerHTML = ""; // Clear previous videos
        defaultMessage.style.display = "none"; // Hide default message
        
        videoData[option].forEach(videoSrc => {
            const videoElement = document.createElement("video");
            videoElement.src = videoSrc;
            videoElement.controls = true;
            videoElement.classList.add("video");
            videoContainer.appendChild(videoElement);
        });
    }

    // Event listener for image clicks
    exerciseOptions.forEach(option => {
        option.addEventListener("click", function() {
            const selectedOption = this.getAttribute("data-option");
            updateVideos(selectedOption);
        });
    });

    //Sidebar toggle function (Correcting menu ID)
    function toggleMenu() {
        const menu = document.getElementById("menu"); // Make sure `menu` matches your HTML ID
        menu.classList.toggle("open"); // Toggle menu class
    }

    //Expose function globally so it works in `onclick`
    window.toggleMenu = toggleMenu;
});
