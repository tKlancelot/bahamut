export class Orbite {
    constructor(name,radius,innerRadius,nbSegments,color)
    {
        this.name = name;
        this.radius = radius;
        this.innerRadius = innerRadius;
        this.nbSegments = nbSegments;
        this.color = color;
    }

    getName()
    {
        return this.name;
    }

}