const attendanceData = {
  Math: {
    "2025-01": {
      total: 4,
      attended: 3,
      records: [
        { date: "2025-01-06", status: "Present" },
        { date: "2025-01-13", status: "Present" },
        { date: "2025-01-20", status: "Present" },
        { date: "2025-01-27", status: "Absent" }
      ]
    },
    "2025-02": {
      total: 4,
      attended: 3,
      records: [
        { date: "2025-02-03", status: "Present" },
        { date: "2025-02-10", status: "Absent" },
        { date: "2025-02-17", status: "Present" },
        { date: "2025-02-24", status: "Present" }
      ]
    },
    "2025-03": {
      total: 5,
      attended: 5,
      records: [
        { date: "2025-03-03", status: "Present" },
        { date: "2025-03-10", status: "Present" },
        { date: "2025-03-17", status: "Present" },
        { date: "2025-03-24", status: "Present" },
        { date: "2025-03-31", status: "Present" }
      ]
    },
    "2025-04": {
      total: 4,
      attended: 3,
      records: [
        { date: "2025-04-07", status: "Absent" },
        { date: "2025-04-14", status: "Present" },
        { date: "2025-04-21", status: "Present" },
        { date: "2025-04-28", status: "Present" }
      ]
    },
    "2025-05": {
      total: 4,
      attended: 3,
      records: [
        { date: "2025-05-05", status: "Present" },
        { date: "2025-05-12", status: "Absent" },
        { date: "2025-05-19", status: "Present" },
        { date: "2025-05-26", status: "Present" }
      ]
    }
  },
  Physics: {
    "2025-01": {
      total: 5,
      attended: 4,
      records: [
        { date: "2025-01-03", status: "Present" },
        { date: "2025-01-10", status: "Absent" },
        { date: "2025-01-17", status: "Present" },
        { date: "2025-01-24", status: "Present" },
        { date: "2025-01-31", status: "Present" }
      ]
    },
    "2025-02": {
      total: 4,
      attended: 4,
      records: [
        { date: "2025-02-07", status: "Present" },
        { date: "2025-02-14", status: "Present" },
        { date: "2025-02-21", status: "Present" },
        { date: "2025-02-28", status: "Present" }
      ]
    },
    "2025-03": {
      total: 4,
      attended: 2,
      records: [
        { date: "2025-03-07", status: "Absent" },
        { date: "2025-03-14", status: "Present" },
        { date: "2025-03-21", status: "Absent" },
        { date: "2025-03-28", status: "Present" }
      ]
    },
    "2025-04": {
      total: 4,
      attended: 4,
      records: [
        { date: "2025-04-04", status: "Present" },
        { date: "2025-04-11", status: "Present" },
        { date: "2025-04-18", status: "Present" },
        { date: "2025-04-25", status: "Present" }
      ]
    },
    "2025-05": {
      total: 5,
      attended: 4,
      records: [
        { date: "2025-05-02", status: "Present" },
        { date: "2025-05-09", status: "Present" },
        { date: "2025-05-16", status: "Present" },
        { date: "2025-05-23", status: "Absent" },
        { date: "2025-05-30", status: "Present" }
      ]
    }
  }
};


// function populateDropdowns() {
//     const dropdowns = {
//         Math: document.getElementById("attendanceDropdownMath"),
//         Physics: document.getElementById("attendanceDropdownPhysics"),
//     };

//     const currentDate = new Date();
//     for (let i = 0; i < 12; i++) {
//         const date = new Date(currentDate.getFullYear(), i);
//         const monthYear = `${date.getFullYear()}-${String(i + 1).padStart(2, "0")}`;
//         const optionText = date.toLocaleString("default", { month: "long", year: "numeric" });
        
//         for (const subject in dropdowns) {
//             const option = document.createElement("option");
//             option.value = monthYear;
//             option.textContent = optionText;
//             if (i === currentDate.getMonth()) option.selected = true;
//             dropdowns[subject].appendChild(option);
//         } 
//     }
// }

function populateDropdowns() {
    const dropdowns = {
        Math: document.getElementById("attendanceDropdownMath"),
        Physics: document.getElementById("attendanceDropdownPhysics"),
    };

    const year = 2025;
    const months = [0, 1, 2, 3, 4]; // Jan (0) to May (4)

    for (const subject in dropdowns) {
        const dropdown = dropdowns[subject];
        dropdown.innerHTML = ""; // Clear existing options

        months.forEach(i => {
            const date = new Date(year, i);
            const monthYear = `${year}-${String(i + 1).padStart(2, "0")}`;
            const optionText = date.toLocaleString("default", { month: "long", year: "numeric" });

            const option = document.createElement("option");
            option.value = monthYear;
            option.textContent = optionText;

            // Always select January (index 0)
            if (i === 0) option.selected = true;

            dropdown.appendChild(option);
        });
    }
}


function updateAttendance(subject) {
    const dropdown = document.getElementById(`attendanceDropdown${subject}`);
    const tableBody = document.getElementById(`attendanceTableBody${subject}`);
    const progressBar = document.getElementById(`progressBar${subject}`);
    const percentageElement = document.getElementById(`attendancePercentage${subject}`);
    const detailsSection = document.getElementById(`attendanceDetails${subject}`);

    tableBody.innerHTML = "";

    const selectedMonth = dropdown.value;
    const subjectData = attendanceData[subject][selectedMonth];

    if (subjectData) {
        const { total, attended, records } = subjectData;
        const percentage = ((attended / total) * 100).toFixed(2);

        percentageElement.textContent = `Attended: ${percentage}%`;
        progressBar.style.width = `${percentage}%`;
        progressBar.setAttribute("aria-valuenow", percentage);

        records.forEach(record => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${record.date}</td>
                <td class="${record.status === "Present" ? "present" : "absent"}">
                    <i class="fas fa-${record.status === "Present" ? "check-circle" : "times-circle"}"></i> ${record.status}
                </td>
            `;
            tableBody.appendChild(row);
        });

        detailsSection.style.display = "block";
    } else {
        percentageElement.textContent = "No data available";
        progressBar.style.width = "0%";
        detailsSection.style.display = "none";
    }
}

populateDropdowns();
updateAttendance("Math");
updateAttendance("Physics");