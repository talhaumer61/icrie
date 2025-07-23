jQuery(document).ready(function () {
    function calculateZakat() {
        let threshold = parseFloat(jQuery('select[name="threshold"]').val()) || 0; // Nisab value
        let totalCapital = 0;
        let totalLiabilities = 0;

        // Sum up all capital values
        jQuery('input[name="capital"]').each(function () {
            let capital = parseFloat(jQuery(this).val()) || 0;
            totalCapital += capital;
        });

        // Sum up all liability values
        jQuery('input[name="liabilities"]').each(function () {
            let liability = parseFloat(jQuery(this).val()) || 0;
            totalLiabilities += liability;
        });

        // Calculate net assets
        let netAssets = totalCapital - totalLiabilities;

        // Check if net assets are above the Nisab threshold
        let zakatPayable = netAssets > threshold ? netAssets * 0.025 : 0;

        // Update the totals in the DOM
        jQuery('.zakat-assets-total').text(netAssets.toFixed(2));
        jQuery('.zakat-dues-total').text(zakatPayable.toFixed(2));
    }

    // Attach event listeners for inputs and dropdown changes
    jQuery('input[name="capital"], input[name="liabilities"], select[name="threshold"]').on('input change', function () {
        calculateZakat();
    });

    // Initial calculation
    calculateZakat();

    // Reset form on button click
    jQuery('#resetForm').on('click', function () {
        // Clear all input fields
        jQuery('input[name="capital"], input[name="liabilities"]').val('');

        // Reset dropdown to default value
        jQuery('select[name="threshold"]').val('');

        // Reset calculated totals
        jQuery('.zakat-assets-total').text('0.00');
        jQuery('.zakat-dues-total').text('0.00');
    });
});
