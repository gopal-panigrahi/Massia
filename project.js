
function getData(method,url,showdata){
    const request = new XMLHttpRequest();

    request.addEventListener('readystatechange',()=>{
      if(request.readyState === 4 && request.status === 200)
      {
          showdata(JSON.parse(request.responseText));
          //alert(request.responseText);
      }
    });
    request.open(method,url);
    request.send();
};

function changestate(pid,stageid){
      if(confirm(" Confirm Changes")){
        let stage = stageid[stageid.length-1];
          let url = "changestage.php?pid="+pid+"&stage="+stage;
          let method = 'GET';
          getData(method,url,(data)=>{
            if (data["status"]==1){
              let classname = "p"+pid;
              let stages = document.getElementsByClassName(classname);
              let i;
              for(i=0;i<=stage-1;i++)
                stages[i].className+=" active";
              for(i;i<5;i++)
                stages[i].className = stages[i].className.replace(/active/g,'');

            }
            else{
              alert("Some Error Occurred");
            }
        });
        location.reload();
      }
    }

const customerData = (searchtext)=>{
    let url = "customer_api.php?name="+searchtext;
    let method = 'GET';
    getData(method,url,(data)=>{
    localStorage.setItem('customerData',JSON.stringify(data));
    let content = "";
    data.forEach(element => {
        content += `<tr id="customer${element.CID}">
        <td>${element.company_name}</td>
        <td>${element.customer_name}</td>
        <td style="display:none">${element.address}</td>
        <td>${element.phone}</td>
        <td>${element.email}</td>
        <td><button class="btn btn-info" onclick="getElementById('Order_CID').value=${element.CID}" data-toggle="modal" data-target="#ord">ORDER</button></td>
        <td><button class="btn btn-warning" onclick="fillupdate(${element.CID})" data-toggle="modal" data-target="#upd">UPDATE</button></td>
        <td><button class="btn btn-danger" onclick="document.getElementById('Delete_cid').value=${element.CID}" data-toggle="modal" data-target="#del">DELETE</button></td>
      </tr>`;
    });
    document.getElementById('cust-details').innerHTML = content;
});
};

const importData = (searchtext)=>{
    let url = "import_api.php?name="+searchtext;
    let method = 'GET';
    getData(method,url,(data)=>{
    let content = "";
    data.forEach(element => {
        content += ` <tr>
      <td>${element.invoice_no}</td>
      <td>${element.date}</td>
      <td>${element.gate_no}</td>
      <td>${element.po_pr}</td>
      <td>${element.time_in}</td>
      <td>${element.time_out}</td>
      <td>${element.vehicle_no}</td>
      <td>${element.name}</td>
      <td>${element.address}</td>
      <td>${element.description}</td>
      <td>${element.quantity}</td>
      <td>${element.received_by}</td>
    </tr>`;
    });
    document.getElementById('import_table').innerHTML = content;
});
};

const inventorydata = ()=>{
    let url = "inventory_api.php";
    let method = 'GET';
    getData(method,url,(data)=>{
    let content = "";
    data.forEach(element => {
        content += ` <tr>
      <td>${element.material_id}</td>
      <td>${element.material}</td>
      <td>${element.quantity}</td>
      <td>${element.used}</td>
      <td>${element.lef}</td>
    </tr>`;
    });
    document.getElementById('inventory_table').innerHTML = content;
});
};

const orderdata = (searchtext)=>{
    let url = "order_api.php?customer="+searchtext;
    let method = 'GET';
    getData(method,url,(data)=>{
    let content = "";
    data.forEach(element => {
        content += ` <tr>
      <td>${element.customer_name}</td>
      <td>${element.company_name}</td>
      <td>${element.CID}</td>
      <td>${element.drawing_no}</td>
      <td>${element.qty}</td>
      <td>${element.remainingdays}</td>
    </tr>`;
    });
    document.getElementById('order_table').innerHTML = content;
});
};

const display_product_details = ()=>{
    let url = "order_api.php";
    let method = 'GET';
    getData(method,url,(data)=>{
      localStorage.setItem('product_details',JSON.stringify(data));
    });
};
