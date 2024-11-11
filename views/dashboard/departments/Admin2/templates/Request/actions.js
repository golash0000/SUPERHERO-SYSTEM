const data = [
    {
      id: 1,
      title: "Request A",
      "request date": "2023-10-01",
      "submitted by": "John Doe",
      "Document Type":"Barangay Id",
      status: "Pending",
    },
    {
      id: 2,
      title: "Request B",
      "request date": "2023-10-02",
      "submitted by": "Jane Smith",
      "Document Type":"Certificate of Indigency",
      status: "Approved",
    },
    {
      id: 3,
      title: "Request C",
      "request date": "2023-10-03",
      "submitted by": "Alice Johnson",
      "Document Type":"Business Permit",
      status: "Rejected",
    },
    {
      id: 4,
      title: "Request D",
      "request date": "2023-10-04",
      "submitted by": "Bob Brown",
      "Document Type":"First time Job Seeker",
      status: "Pending",
    },
    {
      id: 5,
      title: "Request E",
      "request date": "2023-10-05",
      "submitted by": "Charlie Davis",
      "Document Type":"Barangay  Id",
      status: "Approved",
    },
    {
      id: 6,
      title: "Request F",
      "request date": "2023-10-06",
      "submitted by": "Diana Evans",
      "Document Type":"Barangay Id",
      status: "Rejected",
    },
    {
      id: 7,
      title: "Request G",
      "request date": "2023-10-07",
      "submitted by": "Ethan Foster",
      status: "Pending",
      "Document Type":"Certificate of Ownership",
    },
    {
      id: 8,
      title: "Request H",
      "request date": "2023-10-08",
      "submitted by": "Fiona Green",
      "Document Type":"Barangay Id",
      status: "Approved",
    },
    {
      id: 9,
      title: "Request I",
      "request date": "2023-10-09",
      "submitted by": "George Harris",
      "Document Type":"Business Permit",
      status: "Rejected",
    },
    {
      id: 10,
      title: "Request J",
      "request date": "2023-10-10",
      "submitted by": "Hannah White",
      "Document Type":"Barangay Id",
      status: "Pending",
    },
    {
      id: 10,
      title: "Request J",
      "request date": "2023-10-10",
      "submitted by": "Hannah White",
      "Document Type":"Barangay Id",
      status: "Pending",
    },
  ];
  
  const tableBody = document.querySelector("tbody");
  //redenrs the table
  const renderRequestTable = () =>{
  const tableRows = data.map(table => {
    return `
    <tr>
    <td>${table.id}</td>
    <td>${table.title}</td>
    <td>${table["request date"]}</td>
    <td>${table["submitted by"]}</td>
    <td>${table["Document Type"]}</td>
    <td>${table.status}</td>
    <td><button class = "btn btn-primary">View</button>
    </tr>
    `
  })
  tableBody.innerHTML = tableRows.join("")
  }
  renderRequestTable()
  