function addYears()
{
    var currentYear = (new Date()).getFullYear();
    var yearElem = document.forms['signupForm']['year'];
    for(var i = 1935; i <= currentYear; i++)
    {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        yearElem.appendChild(opt);
    }
}
