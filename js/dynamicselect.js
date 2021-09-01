$(document).ready(() => {
    $('#type').change(function() {
        switch (this.value) {
            case '0':
                $('#attributes').html(`
                    <label for="size">Size (MB)</label>
                    <input type="number" step="0.01" class="form-control" id="size" name="size" required>
                    <p>Please, provide dic space in MB</p>
                `);
                break;
            case '1':
                $('#attributes').html(`
                    <label for="weight">Weight</label>
                    <input type="number" step="0.01" class="form-control" id="weight" name="weight" required>
                    <p>Please, provide weight space in Kg</p>
                `);
                break;

            case '2':
                $('#attributes').html(`
                    <label for="height">Height</label>
                    <input type="number" step="0.01" class="form-control" id="height" name="height" required>
                    <label for="width">Width</label>
                    <input type="number" step="0.01" class="form-control" id="width" name="width" required>
                    <label for="length">Length</label>
                    <input type="number" step="0.01" class="form-control" id="length" name="length" required>
                    <p>Please, provide the the hight and width and length</p>
                `);
                break;
        }
    });
});