$(document).ready(function() {
    $("#product_form").submit(function(event) {
        event.preventDefault(); 


        var sku = $("#sku").val().trim();
        if (sku === "") {
            alert("Please enter a valid SKU.");
            return;
        }

        var name = $("#name").val().trim();
        if (name === "") {
            alert("Please enter a valid Name.");
            return;
        }
        if (/\d/.test(name)) {
            alert("Name cannot contain numbers.");
            return;
        }

        var price = $("#price").val().trim();
        if (isNaN(price) || parseFloat(price) <= 0) {
            alert("Please enter a valid Price.");
            return;
        }

        if ($("#productType").val() === "Dvd") {
            var size = $("#size").val().trim();
            if (size === "" || isNaN(parseInt(size))) {
                alert("Please provide a valid integer for size for DVD.");
                return;
            }
        }

        if ($("#productType").val() === "Book") {
            var weight = $("#weight").val().trim();
            if (weight === "" || isNaN(parseInt(weight))) {
                alert("Please provide a valid integer for weight for Book.");
                return;
            }
        }

        if ($("#productType").val() === "Furniture") {
            var height = $("#height").val().trim();
            var width = $("#width").val().trim();
            var length = $("#length").val().trim();

            if (isNaN(parseInt(height)) || isNaN(parseInt(width)) || isNaN(parseInt(length))) {
                alert("Please provide valid integers for dimensions for Furniture.");
                return;
            }
        }

        this.submit();
    });
});