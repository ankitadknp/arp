$(document).ready(function () {
    // Check if the selectedBrand cookie exists
    var selectedBrand = getCookie("selectedBrand");

    // If the cookie exists, update the brand name in the topbar
    if (selectedBrand) {
        $('#selectedBrandLabel').text(selectedBrand);
    } else {
        // The cookie doesn't exist, show the brand selection modal
        $('#modal').modal('show');
    }
});

$(document).ready(function () {
    $('#modal').on('shown.bs.modal', function () {
        $('#selectBrand').on('change', function () {
            var selectedBrand = $(this).val();
            console.log('Selected Brand ID:', selectedBrand);
            if (selectedBrand) {
                // Store selected brand name in a cookie with an expiration time (in seconds)
                var expirationTime = 3600; // 1 hour (you can adjust this value)
                var expiryDate = new Date();
                expiryDate.setTime(expiryDate.getTime() + (expirationTime * 1000)); // Convert to milliseconds

                document.cookie = "selectedBrand=" + selectedBrand + "; expires=" + expiryDate.toUTCString() + "; path=/";
                document.cookie = "brandModalShown=true; expires=" + expiryDate.toUTCString() + "; path=/"; // Mark the modal as shown
                $('#modal').modal('hide');

                // Update the brand name in the topbar immediately
                $('#selectedBrandLabel').text(selectedBrand);
            }
        });
    });
});

// Function to retrieve a cookie value by name
function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i].trim();
        if (cookie.indexOf(name) == 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return null;
}