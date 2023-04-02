
document.addEventListener('DOMContentLoaded', ()=>{
    let current = 0;
    let next = -1;

    let all_inputs = document.querySelectorAll(".letter_input");
    
    next = next_input();
    if (next != -1) {
        current = next;
        all_inputs[next].focus();
    }

    for (let i=0; i<all_inputs.length; i++){
        let input = all_inputs[i];
        input.addEventListener('input', ()=>{
            if (input.value.length > 1){
                input.value = input.value.slice(1, 2);
            }
            next = next_input();
            if (next != -1){
                current = next;
                all_inputs[next].focus();
            }
        });
    }

    function next_input(){
        for (let i=0; i<all_inputs.length; i++){
            if (!all_inputs[i].disabled && all_inputs[i].type != "hidden" && all_inputs[i].value.length == 0){
                return i;
            }
        }
        return -1;
    }

    document.addEventListener('keydown', (e)=>{
        if (e.key == "ArrowRight"){
            if (current < all_inputs.length-1){
                all_inputs[current+1].focus();
                current++;
            }
    }});
    
    document.addEventListener('keydown', (e)=>{
        if (e.key == "ArrowLeft"){
            if (current > 0){
                all_inputs[current-1].focus();
                current--;
            }
    }});

    function get_current(){
        return current;
    }


})
