<!-- <script>
 $(document).ready(function () {
    // Function to calculate Zakat
    alert('e');
    function calculateZakat() {
        // Get the selected threshold value
        let threshold = parseFloat($('select[name="threshold"]').val()) || 0;

        // Initialize total assets and liabilities
        let totalAssets = 0;
        let totalLiabilities = 0;

        // Sum up all the capital inputs
        $('input[name="capital"]').each(function () {
            let value = parseFloat($(this).val()) || 0;
            totalAssets += value;
        });

        // Sum up all the liabilities inputs
        $('input[name="liabilities"]').each(function () {
            let value = parseFloat($(this).val()) || 0;
            totalLiabilities += value;
        });

        // Calculate current assets and Zakat payable
        let currentAssets = totalAssets - totalLiabilities;
        let zakatPayable = currentAssets > threshold ? (currentAssets * 0.025) : 0;

        // Update the displayed values
        $('.zakat-assets-total').text(currentAssets.toFixed(2));
        $('.zakat-dues-total').text(zakatPayable.toFixed(2));
    }

    // Attach the keyup event to all relevant input fields
    $('input[name="capital"], input[name="liabilities"]').on('keyup', function () {
        calculateZakat();
    });

    // Also recalculate when the threshold dropdown is changed
    $('select[name="threshold"]').on('change', function () {
        calculateZakat();
    });
});

</script> -->