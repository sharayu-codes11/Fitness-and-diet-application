document.addEventListener("DOMContentLoaded", function() {
    const videoContainer = document.getElementById("video-container");
    const defaultMessage = document.getElementById("default-message");

    const videoBasePath = "assets/vids/zumba/"; // Path where videos are stored

    // Default videos to load on page load
    const defaultVideos = [
        
        videoBasePath + "zvid2.mp4",
        videoBasePath + "zvid3.mp4",
        videoBasePath + "zvid4.mp4",
        videoBasePath + "zvid5.mp4",
        videoBasePath + "zvid6.mp4",
        videoBasePath + "zvid7.mp4",
        videoBasePath + "zvid8.mp4",
        videoBasePath + "zvid9.mp4",
        videoBasePath + "zvid10.mp4",
        videoBasePath + "zvid11.mp4"
    ];

    function loadDefaultVideos() {
        videoContainer.innerHTML = ""; // Clear existing content
        defaultMessage.style.display = "none"; // Hide the message

        defaultVideos.forEach(videoSrc => {
            const videoElement = document.createElement("video");
            videoElement.src = videoSrc;
            videoElement.controls = true;
            videoElement.classList.add("video");
            videoContainer.appendChild(videoElement);
        });
    }

    // Load default videos when the page loads
    loadDefaultVideos();

    // Sidebar toggle function
    function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("open");
    }

    window.toggleMenu = toggleMenu;
});
