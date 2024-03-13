$(function () {


  // =====================================
  // Branches
  // =====================================
  var branches = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 40,
      sparkline: {
        enabled: true,
      },
      group: "sparklines branches",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Branches",
        color: "#49BEFF",
        data: [Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3),Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3)],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      colors: ["#f3feff"],
      type: "solid",
      opacity: 0.05,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#branches"), branches).render();



  // =====================================
  // Agents
  // =====================================
  var agents = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 40,
      sparkline: {
        enabled: true,
      },
      group: "sparklines agent",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Agents",
        color: "#49BEFF",
        data: [Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3),Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3)],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      colors: ["#f3feff"],
      type: "solid",
      opacity: 0.05,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#agents"), agents).render();


  // =====================================
  // Parcels
  // =====================================
  var parcels = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 40,
      sparkline: {
        enabled: true,
      },
      group: "sparklines parcels",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Parcels",
        color: "#49BEFF",
        data: [Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3),Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3), Math.floor(Math.random()*3)],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      colors: ["#f3feff"],
      type: "solid",
      opacity: 0.05,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#parcels"), parcels).render();
})