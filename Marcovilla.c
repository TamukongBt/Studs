#include <stdio.h>
#include <math.h>

int main(){
    float a,b,c,root1,root2,real,imaginary,discr;
    printf("This program solves quadratic equations of the form ax^2+bx+c=0\n");
    printf("Enter the value of a:");
    scanf("%f",&a);
    printf("Enterthe value of b:");
    scanf("%f",&b);
    printf("Enter the value of c:");
    scanf("%f",&c);
    discr=b*b-(4*a*c);
    if (discr==0)
                {root1=(-b+sqrt(discr))/2*a;
                printf("The solution to the equation is x1=x2=%.2f\n",root1);}
    else if (discr>0)
                {root1=(-b+sqrt(discr))/2*a;
                 root2=(-b-sqrt(discr))/2*a;
                 printf("The solution to the equation are x1=%.2f and x2=%.2f",root1,root2);}
    else if(discr<0)
                 {real=-b/2*a;
                 imaginary=sqrt(4*a*c*-b*b)/2*a;
                    printf("The solutions to the equation are X1=%.2f + %.2fi and x2=%.2f-%.2fi \n",real,imaginary);}
return 0;}                 

