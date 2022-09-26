//H5P
function addH5p(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //create a fieldset element with the proper attributes/values
    const contentFieldset = document.createElement("fieldset");
    contentFieldset.setAttribute("class", "form__fieldset");

    //create a legend element with the proper attributes/values
    const contentFieldsetLegend = document.createElement("legend");
    contentFieldsetLegend.setAttribute("class", "form__fieldset__legend");
    contentFieldsetLegend.innerHTML = "Contenu";

    //create an input element with the proper attributes/values
    const contentInput = document.createElement("input");
    contentInput.setAttribute("class", "btn btn--secondary");
    contentInput.setAttribute("type", "file");
    contentInput.setAttribute("name", "fileToUpload");
    contentInput.setAttribute("id", "fileToUpload");

    //create a hidden input element with the h5p data type
    const hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "post_content_type");
    hiddenInput.setAttribute("value", "h5p");

    //assemble the created elements
    contentContainer.appendChild(contentFieldset);
    contentFieldset.appendChild(contentFieldsetLegend);
    contentFieldset.appendChild(contentInput);
    contentFieldset.appendChild(hiddenInput);

    //toggle between add and remove buttons
    document.querySelector(".btn--addH5p").style.display = "none";
    document.querySelector(".btn--removeH5p").style.display = "flex";
};
function removeH5p(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //remove imput
    contentContainer.removeChild(contentContainer.firstElementChild)

    //toggle between add and remove buttons
    document.querySelector(".btn--addH5p").style.display = "flex";
    document.querySelector(".btn--removeH5p").style.display = "none";
};

//Text
function addText(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //create a fieldset element with the proper attributes/values
    const contentFieldset = document.createElement("fieldset");
    contentFieldset.setAttribute("class", "form__fieldset");

    //create a legend element with the proper attributes/values
    const contentFieldsetLegend = document.createElement("legend");
    contentFieldsetLegend.setAttribute("class", "form__fieldset__legend");
    contentFieldsetLegend.innerHTML = "Contenu";

    //create an input element with the proper attributes/values
    const contentInput = document.createElement("textarea");
    contentInput.setAttribute("class", "textarea");
    contentInput.setAttribute("name", "post_content");
    contentInput.setAttribute("cols", "30");
    contentInput.setAttribute("rows", "10");
    contentInput.setAttribute("placeholder", "Contenu");

    //create a hidden input element with the text data type
    const hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "post_content_type");
    hiddenInput.setAttribute("value", "text");

    //assemble the created elements
    contentFieldset.appendChild(contentInput);
    contentFieldset.appendChild(hiddenInput);
    contentFieldset.appendChild(contentFieldsetLegend);
    contentContainer.appendChild(contentFieldset);

    //toggle between add and remove buttons
    document.querySelector(".btn--addText").style.display = "none";
    document.querySelector(".btn--removeText").style.display = "flex";
};
function removeText(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //remove imput
    contentContainer.removeChild(contentContainer.firstElementChild)

    //toggle between add and remove buttons
    document.querySelector(".btn--addText").style.display = "flex";
    document.querySelector(".btn--removeText").style.display = "none";
};

//PDF
function addPdf(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //create a fieldset element with the proper attributes/values
    const contentFieldset = document.createElement("fieldset");
    contentFieldset.setAttribute("class", "form__fieldset");

    //create a legend element with the proper attributes/values
    const contentFieldsetLegend = document.createElement("legend");
    contentFieldsetLegend.setAttribute("class", "form__fieldset__legend");
    contentFieldsetLegend.innerHTML = "Contenu";

    //create an input element with the proper attributes/values
    const contentInput = document.createElement("input");
    contentInput.setAttribute("class", "btn btn--secondary");
    contentInput.setAttribute("type", "file");
    contentInput.setAttribute("name", "fileToUpload");
    contentInput.setAttribute("id", "fileToUpload");

    //create a hidden input element with the pdf data type
    const hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "post_content_type");
    hiddenInput.setAttribute("value", "pdf");

    //assemble the created elements
    contentContainer.appendChild(contentFieldset);
    contentFieldset.appendChild(contentFieldsetLegend);
    contentFieldset.appendChild(contentInput);
    contentFieldset.appendChild(hiddenInput);

    //toggle between add and remove buttons
    document.querySelector(".btn--addPdf").style.display = "none";
    document.querySelector(".btn--removePdf").style.display = "flex";
};
function removePdf(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //remove imput
    contentContainer.removeChild(contentContainer.firstElementChild);

    //toggle between add and remove buttons
    document.querySelector(".btn--addPdf").style.display = "flex";
    document.querySelector(".btn--removePdf").style.display = "none";
};

//Slide
function addSlide(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //create a fieldset element with the proper attributes/values
    const contentFieldset = document.createElement("fieldset");
    contentFieldset.setAttribute("class", "form__fieldset");

    //create a legend element with the proper attributes/values
    const contentFieldsetLegend = document.createElement("legend");
    contentFieldsetLegend.setAttribute("class", "form__fieldset__legend");
    contentFieldsetLegend.innerHTML = "Contenu";

    //create an input element with the proper attributes/values
    const contentInput = document.createElement("input");
    contentInput.setAttribute("class", "btn btn--secondary");
    contentInput.setAttribute("type", "file");
    contentInput.setAttribute("name", "fileToUpload");
    contentInput.setAttribute("id", "fileToUpload");

    //create a hidden input element with the slide data type
    const hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "post_content_type");
    hiddenInput.setAttribute("value", "slide");

    //assemble the created elements
    contentContainer.appendChild(contentFieldset);
    contentFieldset.appendChild(contentFieldsetLegend);
    contentFieldset.appendChild(contentInput);
    contentFieldset.appendChild(hiddenInput);

    //toggle between add and remove buttons
    document.querySelector(".btn--addSlide").style.display = "none";
    document.querySelector(".btn--removeSlide").style.display = "flex";
};
function removeSlide(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //remove imput
    contentContainer.removeChild(contentContainer.firstElementChild);

    //toggle between add and remove buttons
    document.querySelector(".btn--addSlide").style.display = "flex";
    document.querySelector(".btn--removeSlide").style.display = "none";
};

//Kahoot
function addKahoot(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //create a fieldset element with the proper attributes/values
    const contentFieldset = document.createElement("fieldset");
    contentFieldset.setAttribute("class", "form__fieldset");

    //create a legend element with the proper attributes/values
    const contentFieldsetLegend = document.createElement("legend");
    contentFieldsetLegend.setAttribute("class", "form__fieldset__legend");
    contentFieldsetLegend.innerHTML = "Contenu";

    //create an input element with the proper attributes/values
    const contentInput = document.createElement("input");
    contentInput.setAttribute("type", "text");
    contentInput.setAttribute("class", "input");
    contentInput.setAttribute("name", "post_content");
    contentInput.setAttribute("placeholder", "KAHOOT!");

    //create a hidden input element with the Kahoot! data type
    const hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "post_content_type");
    hiddenInput.setAttribute("value", "kahoot");

    //assemble the created elements
    contentFieldset.appendChild(contentInput);
    contentFieldset.appendChild(hiddenInput);
    contentFieldset.appendChild(contentFieldsetLegend);
    contentContainer.appendChild(contentFieldset);

    //toggle between add and remove buttons
    document.querySelector(".btn--addKahoot").style.display = "none";
    document.querySelector(".btn--removeKahoot").style.display = "flex";
};
function removeKahoot(){

    //select content container in the document
    const contentContainer = document.querySelector(".content__container");

    //remove imput
    contentContainer.removeChild(contentContainer.firstElementChild)

    //toggle between add and remove buttons
    document.querySelector(".btn--addKahoot").style.display = "flex";
    document.querySelector(".btn--removeKahoot").style.display = "none";
};