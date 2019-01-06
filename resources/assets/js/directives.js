Vue.directive('focus', {
    inserted: (element, binding) => {
        if (binding.value === true) {
            element.focus();
        }
    }
});