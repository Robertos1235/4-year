function drawPyramid(floors)
{
    let counter = 1;
    const maxCounter = 1 + (floors - 1);

    const pyramidWrapper = document.createElement('div');
    const pyramidMain = document.getElementById("pyramidMain");
    pyramidWrapper.classList = "pyramid";

    for(let currentFloor = 0; currentFloor < floors; currentFloor++)
    {
        const pyramidFloor = document.createElement('div');

        drawRow("", maxCounter, counter, pyramidFloor);

        drawRow("*", null, counter, pyramidFloor);

        pyramidWrapper.append(pyramidFloor);

        counter += 2;
        
    }

    pyramidMain.append(pyramidWrapper);
}

function drawRow(element, maxCounter, counter, pyramidFloor)
{

    let innerCounter;

    maxCounter != null ? innerCounter = maxCounter - counter/2: innerCounter = counter;

    for(let count = 0; count < innerCounter;count++)
    {
        const brick = document.createElement('span');
        brick.textContent = element;

        pyramidFloor.append(brick);
    }
}