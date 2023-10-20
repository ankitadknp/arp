$(document).ready(function () {
    var selectedBrand = getCookie("selectedBrand");  // Check if the selectedBrand cookie exists

    if (selectedBrand) {
        $('#selectedBrandLabel').text(selectedBrand);
    } else {
        $('#modal').modal('show');  // The cookie doesn't exist, show the brand selection modal
    }
});

$(document).ready(function () {
    $('#modal').on('shown.bs.modal', function () {
        $('#selectBrand').on('change', function () {
            var selectedBrand = $(this).val();
            console.log('Selected Brand ID:', selectedBrand);
            if (selectedBrand) {

                var expirationTime = 3600; // 1 hour (you can adjust this value)
                var currentTime = new Date().getTime(); // Current time in milliseconds
                var expiryTime = currentTime + (expirationTime * 1000); // Convert to milliseconds
                var expiryDate = new Date(expiryTime);

                document.cookie = "selectedBrand=" + selectedBrand + "; expires=" + expiryDate.toUTCString() + "; path=/";
                document.cookie = "brandModalShown=true; expires=" + expiryDate.toUTCString() + "; path=/"; // Mark the modal as shown
                $('#modal').modal('hide');

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

function deleteCookie(cookieName,path) {
    // document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=" + path + ";";
}


$(document).ready(function () {
    $('.topbar').on('click', function () {
        var currentPath = window.location.pathname; // Get the current URL path
        var selectedBrandLabelElement = document.getElementById("selectedBrandLabel");
        var selectedBrand = selectedBrandLabelElement.textContent;
        // deleteCookie(selectedBrand, "/"); 
        deleteCookie(selectedBrand, currentPath);
        $('#selectedBrandLabel').text("");  // Optionally, update the brand name in the topbar to a default value
    });
});







