function createTable(size)
{
    const tableWrapper = document.getElementById('tableWrapper');

    size++;

    for(let row = 0; row < size; row++)
    {

        const rowWrapper = document.createElement('tr');

        for(let column = 0; column < size; column++)
        {
            let item;

            if(row === 0 )
            {
                item = document.createElement('th');
            }
            else if(column === 0)
            {
                item = document.createElement('th');
            }
            else
            {
                item = document.createElement('td');
            }


            if(row === 0 && column === 0)
            {
                item.textContent = "";
            }
            else if(row === 0)
            {  
                item.textContent = column;
            }   
            else if(column === 0)
            {
                item.textContent = row;
            }
            else
            {
                item.textContent = column * row;
            }

            rowWrapper.append(item);
        }

        tableWrapper.append(rowWrapper);
    }
}