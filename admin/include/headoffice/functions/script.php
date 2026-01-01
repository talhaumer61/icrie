<script>
    document.querySelectorAll('[id^="ckeditor"]').forEach(function(element) {
        CKEDITOR.replace(element);
    });

    function toggleSubType() {
        const selectedType = document.getElementById('function_type').value;
        const subTypeContainer = document.getElementById('sub_type_container');

        // Check if the selected type is "Publications"
        if (selectedType === "2") {
            subTypeContainer.style.display = "block"; // Show the Sub Type input
        } else {
            subTypeContainer.style.display = "none"; // Hide the Sub Type input
        }
    }
</script>