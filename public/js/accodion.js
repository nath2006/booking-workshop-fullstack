document.addEventListener('DOMContentLoaded', () => {
    // Function to calculate and set heights of accordions
    function calculateAccordionHeights() {
        const accordions = document.querySelectorAll('.accordion');

        accordions.forEach((accordion) => {
            // Calculate the height of each accordion element
            const height = accordion.scrollHeight;

            // Set the height as an inline style
            accordion.style.height = `${height}px`;
        });
    }

    // Initial calculation when the DOM is fully loaded
    calculateAccordionHeights();

    // Recalculate when a new participant is added
    document.addEventListener('newParticipantAdded', () => {
        calculateAccordionHeights();
    });
});
