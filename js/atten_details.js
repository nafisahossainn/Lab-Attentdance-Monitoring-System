const attendanceData = {
    OS: {
        "2024-12": { total: 31, attended: 2, records: [{ date: "2024-12-01", status: "Present" }, { date: "2024-12-02", status: "Absent" }] },
    },
    OOP: {
        "2024-12": { total: 31, attended: 4, records: [{ date: "2024-12-01", status: "Present" }, { date: "2024-12-03", status: "Present" }, { date: "2024-12-03", status: "Absent" }, { date: "2024-12-03", status: "Present" }] },
    },
};

function populateDropdowns() {
    const dropdowns = {
        OS: document.getElementById("attendanceDropdownOS"),
        OOP: document.getElementById("attendanceDropdownOOP"),
    };

    const currentDate = new Date();
    for (let i = 0; i < 12; i++) {
        const date = new Date(currentDate.getFullYear(), i);
        const monthYear = ${date.getFullYear()}-${String(i + 1).padStart(2, "0")};
        const optionText = date.toLocaleString("default", { month: "long", year: "numeric" });

        for (const subject in dropdowns) {
            const option = document.createElement("option");
            option.value = monthYear;
            option.textContent = optionText;
            if (i === currentDate.getMonth()) option.selected = true;
            dropdowns[subject].appendChild(option);
        }
    }
}

function updateAttendance(subject) {
    const dropdown = document.getElementById(attendanceDropdown${subject});
    const tableBody = document.getElementById(attendanceTableBody${subject});
    const progressBar = document.getElementById(progressBar${subject});
    const percentageElement = document.getElementById(attendancePercentage${subject});
    const detailsSection = document.getElementById(attendanceDetails${subject});

    tableBody.innerHTML = "";

    const selectedMonth = dropdown.value;
    const subjectData = attendanceData[subject][selectedMonth];

    if (subjectData) {
        const { total, attended, records } = subjectData;
        const percentage = ((attended / total) * 100).toFixed(2);

        percentageElement.textContent = Attended: ${percentage}%;
        progressBar.style.width = ${percentage}%;
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
updateAttendance("OS");
updateAttendance("OOP");