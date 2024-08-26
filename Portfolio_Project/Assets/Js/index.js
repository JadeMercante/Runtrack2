// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("openModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

let PreviousFolder = null;

function openWeb(idfolder) {
    
    // Open the new folder
    var modal = document.getElementById('Web_' + idfolder);
    modal.classList.add('ShownFolder');
}

function closeWeb(idfolderclose) {
    var modalclose = document.getElementById('Web_' + idfolderclose);
    modalclose.classList.remove('ShownFolder');
}

function openFolder(idfolder) {
    // If there is a previous folder, close it
    if (PreviousFolder !== null) {
        closeFolder(PreviousFolder);
        PreviousFolder = null;
    }
    
    // Open the new folder
    
    var modal = document.getElementById('Folder_' + idfolder);
    modal.classList.add('ShownFolder');
    
    // Update the previous folder
    PreviousFolder = idfolder;
}

function closeFolder(idfolderclose) {
    var modalclose = document.getElementById('Folder_' + idfolderclose);
    modalclose.classList.remove('ShownFolder');
}


document.addEventListener('DOMContentLoaded', (event) => {
    try {
        const container = document.querySelector('.Desktop_1');
        const icons = document.querySelectorAll('.folder_icon');
        const windows = document.querySelectorAll('.modal-content');
        
    windows.forEach(window => {
      window.addEventListener('dragstart', dragStart);
      window.addEventListener('dragend', dragEnd);
      });
    
  
    icons.forEach(icon => {
      icon.addEventListener('dragstart', dragStart);
      icon.addEventListener('dragend', dragEnd);
    });
  
    document.addEventListener('dragover', dragOver);
    document.addEventListener('drop', drop);
  
    function dragStart(e) {
      e.dataTransfer.setData('text/plain', e.target.id);
      setTimeout(() => {
        e.target.style.opacity = '0.5';
      }, 0);
    }
  
    function dragEnd(e) {
      e.target.style.opacity = '1';
    }
  
    function dragOver(e) {
      e.preventDefault();
    }
  
    function drop(e) {
        e.preventDefault();
        const id = e.dataTransfer.getData('text');
        const draggableElement = document.getElementById(id);
        const container = document.querySelector('.Desktop_1');
    
        if (draggableElement && container) {
            const containerRect = container.getBoundingClientRect();
            const dropX = e.clientX - containerRect.left;
            const dropY = e.clientY - containerRect.top;
    
            // Get the dimensions of the draggable element
            const elementRect = draggableElement.getBoundingClientRect();
            const elementWidth = elementRect.width;
            const elementHeight = elementRect.height;
    
            // Calculate the position to center the element on the mouse cursor
            const adjustedX = dropX - (elementWidth / 2);
            const adjustedY = dropY - (elementHeight / 2);
    
            // Set position to absolute and update coordinates
            draggableElement.style.position = 'absolute';
            draggableElement.style.left = `${adjustedX}px`;
            draggableElement.style.top = `${adjustedY}px`;
        }
    }

    } catch (error) {
        console.error(error);
    }
  });

  function alternateposition(idmodal) {
    var modal = document.getElementById('modal_' + idmodal);
    if (idmodal % 2 == 0) {
        modal.style.position = 'absolute';
    } else {
        modal.style.position = 'relative';
    }
  }

  function addclickedclass(idicon) {
    var previousicon = document.getElementById("clicked_icon");
    if (previousicon) {
      previousicon.classList.remove("clicked_icon");
      // Remove the clicked_icon id
      previousicon.removeAttribute("id");
    }
  
    var clickedicon = document.getElementById(idicon);
    if (clickedicon) {
      clickedicon.classList.add("clicked_icon");
      // Add the clicked_icon id as a data attribute to preserve the original id
      clickedicon.setAttribute("clicked_icon", "true");
      // Set the clicked_icon id
      clickedicon.id = "clicked_icon";
    }
  }