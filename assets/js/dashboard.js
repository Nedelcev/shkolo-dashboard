// Initialize SortableJS on the grid container
var sortable = new Sortable(document.getElementById('sortableGrid'), {
    animation: 150,  // Animation speed
    onEnd: function (evt) {
        updatePositions();  // Update positions when drag and drop is complete
    }
});

// Function to update the button positions using AJAX
function updatePositions() {
    var gridItems = document.querySelectorAll('.grid-item');
    var positions = [];

    gridItems.forEach(function (item, index) {
        var id = item.getAttribute('data-id'); // Get button ID
        if (id) {
            positions.push({ id: id, position: index + 1 });
        }
    });

    // Send the new positions to the server using AJAX
    axios.post('/ButtonController/updatePositions', { positions: positions })
        .then(function (response) {
            console.log('Positions updated successfully!');
        })
        .catch(function (error) {
            console.error('Error updating positions:', error);
        });
}
