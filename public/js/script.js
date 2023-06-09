document.addEventListener('DOMContentLoaded', () => {
    let current = 0;

    let all_inputs = document.querySelectorAll(".letter_input");

    let first_selected = false;
    for (let i = 0; i < all_inputs.length; i++) {
        let input = all_inputs[i];

        if (!first_selected && !input.disabled && input.type != "hidden") {
            input.focus();
            first_selected = true;
        }

        input.addEventListener('input', () => {
            if (input.value.length > 1) {
                input.value = input.value.slice(1, 2);
            }
            next_input().focus();
        });
    }

    function previous_input() {
        if (current - 1 < 0) {
            return all_inputs[current];
        }
        current--;
        let previous_input = all_inputs[current];
        while (previous_input.disabled || previous_input.type == "hidden") {
            if (current - 1 >= 0) {
                current--;
                previous_input = all_inputs[current];
            } else {
                break;
            }
        }
        return previous_input;
    }

    function next_input() {
        if (current + 1 >= all_inputs.length) {
            return all_inputs[current];
        }
        current++;
        let next_input = all_inputs[current];
        while (next_input.disabled || next_input.type == "hidden") {
            if (current + 1 < all_inputs.length) {
                current++;
                next_input = all_inputs[current];
            } else {
                break;
            }
        }
        return next_input;
    }

    document.addEventListener('keydown', (e) => {
        if (e.key == "ArrowRight") {
            next_input().focus();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key == "ArrowLeft") {
            all_inputs[current].setSelectionRange(0,0);
            previous_input().focus();
        }
    });

})
