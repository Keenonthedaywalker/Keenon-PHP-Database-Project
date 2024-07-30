//Handles the checkboxes
function myFunction() {
// // These can't be used with eachother
    var isolated = document.getElementById("tag_isolated")
    var deadEnd = document.getElementById("tag_deadEnd")
    var highway = document.getElementById("tag_highway")

    // These can't be used with each other
    var coast = document.getElementById("tag_coast")
    var confluence = document.getElementById("tag_confluence")
    var estuary = document.getElementById("tag_estuary")
    var island = document.getElementById("tag_island")
    var pond = document.getElementById("tag_pond")
    var river = document.getElementById("tag_river")

    // These can't be used with each other
    var dense = document.getElementById("tag_dense")
    var sparse = document.getElementById("tag_sparse")

    // These can't be used with each other
    var district = document.getElementById("tag_district")
    var palisade = document.getElementById("tag_palisade")

    // These can't be used with each other
    var farmland = document.getElementById("tag_farmland")
    var noOrchards = document.getElementById("tag_noOrchards")
    var uncultivated = document.getElementById("tag_uncultivated")

    if (isolated.checked == true) {
        deadEnd.checked = false;
        highway.checked = false;
    }else if (deadEnd.checked == true) {
        isolated.checked = false;
        highway.checked = false;
        island.checked = false;
    }else if (highway.checked == true) {
        isolated.checked = false;
        deadEnd.checked = false;
    }

    if (coast.checked == true) {
        confluence.checked = false;
        estuary.checked = false;
        island.checked = false;
        pond.checked = false;
        river.checked = false;
    }else if (confluence.checked == true) {
        coast.checked = false;
        estuary.checked = false;
        island.checked = false;
        pond.checked = false;
        river.checked = false;
    }else if (estuary.checked == true) {
        coast.checked = false;
        confluence.checked = false;
        island.checked = false;
        pond.checked = false;
        river.checked = false;
    }else if (island.checked == true) {
        coast.checked = false;
        confluence.checked = false;
        estuary.checked = false;
        pond.checked = false;
        river.checked = false;
        deadEnd.checked = false;
        highway.checked = false;
    }else if (pond.checked == true) {
        coast.checked = false;
        confluence.checked = false;
        island.checked = false;
        estuary.checked = false;
        river.checked = false;
    }else if (river.checked == true) {
        coast.checked = false;
        confluence.checked = false;
        island.checked = false;
        pond.checked = false;
        estuary.checked = false;
    }

    if (dense.checked == true) {
        sparse.checked = false;
    }else if (sparse.checked == true) {
        dense.checked = false;
    }

    if (district.checked == true) {
        palisade.checked = false;
    }else if (palisade.checked == true) {
        district.checked = false;
    }

    if (farmland.checked == true) {
        noOrchards.checked = false;
        uncultivated.checked = false;
    }else if (noOrchards.checked == true) {
        farmland.checked = false;
        uncultivated.checked = false;
    }else if (uncultivated.checked == true) {
        farmland.checked = false;
        noOrchards.checked = false;
    }

}