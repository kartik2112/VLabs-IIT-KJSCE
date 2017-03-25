function numcheck(num)
{
    if(isNaN(parseInt(num)))
    {
        return (false);
    }
    else
    {
        return (true);
    }
}
function numpositive(num)
{
    if(numcheck(num))
    {
        if(parseInt(num)>=0)
        {
            return (true);
        }
        else
        {
            return (false);
        }
    }
    else
    {
        return (false);
    }
}
function numnegative(num) {
    if (numcheck(num)) {
        if (parseInt(num) <= 0) {
            return (true);
        }
        else {
            return (false);
        }
    }
    else {
        return (false);
    }
}
function grashofcheck(l1,l2,l3,l4)
{
    if(Math.max(l1,l2,l3,l4)+Math.min(l1,l2,l3,l4)<l1+l2+l3+l4-Math.max(l1,l2,l3,l4)-Math.min(l1,l2,l3,l4))
    {
        return (true);
    }
    else
    {
        return (false);
    }
}
function grashoftype(l1,l2,l3,l4)
{
    if (l3 == Math.min(l1, l2, l3, l4))
    {
        return (false);
    }
    else
    {
        return (true);
    }
}
function maxarray(num)
{
    var i;
    var maxnum = num[0];
    //alert(maxnum);
    for(i=0;i<num.length;i++)
    {
        if (maxnum < num[i]);
        {
            maxnum = num[i];
        }
    }
    return (maxnum);
}
function minarray(num) {
    var i;
    var maxnum = num[0];
    for (i = 0; i < num.length; i++) {
        if (maxnum > num[i]);
        {
            maxnum = num[i];
        }
    }
    return (maxnum);
}