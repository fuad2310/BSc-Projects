import java.lang.*;
import Interface.*;
import java.util.*;
import java.io.*;
import classes.*;
import Interface.*;

public class Start
{
	public static void main(String args[])
	{
		try
		{
			University AIUB = new University() ;
			while(true)
			{
				System.out.println("You have this following options.Choose any one :");
				System.out.println("1. Faculty Management.");
				System.out.println("2. Student Management.");
				System.out.println("3. Course Transactions .");
				System.out.println("4. Exit.");
				Scanner user_input = new Scanner( System.in );
				//int c=user_input.nextInt();
				switch ( user_input.nextInt())
				{
					
					case 1:
					while(true)
					{
						
						System.out.println("Options For Faculty Management :");
						System.out.println("1. Insert New Faculty.");
						System.out.println("2. Remove Existing Faculty.");
						System.out.println("3. Show All Faculty .");
						System.out.println("4. Go back.");
						int c1=user_input.nextInt();
						switch (c1)
						{
							
							case 1:
							Faculty e =new Faculty();
							System.out.println("....Inserting new Faculty....");
							System.out.println("");
							System.out.println("Enter Faculty Name :");
							user_input.nextLine();
							String name= new String();
							name=user_input.nextLine();
							e.setName(name); 
							
							System.out.println("Enter Faculty Salary :");
							double salary =user_input.nextDouble();
							e.setSalary(salary);
							
							user_input.nextLine();
							System.out.println("Enter Faculty ID :");
							String id =user_input.nextLine();
							e.setFId(id);
							
							
							
							AIUB.insertFaculty(e);
							System.out.println(" ");
							
							break;
							
							case 2:
							Faculty e1 =new Faculty();
							System.out.println("....Removing existing Faculty....");
							System.out.println("");
						    user_input.nextLine();
							System.out.println("Enter Faculty ID to Remove:");
							String id1 = user_input.nextLine();
							e1.setFId(id1);
							
							AIUB.removeFaculty(e1);
							
							
							break;
							
							case 3:
							AIUB.showAllFaculty();
							System.out.println(" ");
							break;
							case 4:
							
							break;
							
							
							
							default:
							System.out.println("Wrong Input..");
							System.out.println(" ");
						}
						if(c1==4)break;
						
						
					}
					break;
					
					case 2:
					while(true)
					{
						System.out.println("Options For Student Management :");
						System.out.println("1. Insert New Student.");
						System.out.println("2. Remove Existing Student.");
						System.out.println("3. Show All Student .");
						System.out.println("4. Go back.");
						int c2 =user_input.nextInt();
						switch ( c2 )
						{
							
							case 1:
							Student e3 =new Student();
							System.out.println("....Inserting new Student....");
							System.out.println("");
							System.out.println("Enter Student Name :");
							user_input.nextLine();
							String name1= new String();
							name1=user_input.nextLine();
							e3.setName(name1); 
							
							System.out.println("Enter Student ID :");
							int id2 =user_input.nextInt();
							e3.setSid(id2);
							
							System.out.println("How many course do want to assign to the student: ");
							int no=user_input.nextInt();
							if(no<=6)
							{
								
								for(int k=0;k<no;k++){
									Course co = new Course();
									System.out.println("Enter course number: ");
									int cid=user_input.nextInt();
									co.setCourseNumber(cid);
									System.out.println("Enter credit for course "+(k+1)+" : ");
									int cred=user_input.nextInt();
									co.setCredit(cred);
									e3.insertCourse(co);
									
								}
								
								
								AIUB.InsertStudent(e3,no);
								System.out.println(" ");
							}
							else
							{
								System.out.println("You can register maximum 6 courses.Try Again!");
							}
							
							break;
							
							case 2:
							Student e4 =new Student();
							System.out.println("....Removing existing Student....");
							System.out.println("");
						    user_input.nextLine();
							System.out.println("Enter Student ID to Remove:");
							int id3 = user_input.nextInt();
							e4.setSid(id3);
							
							AIUB.removeStudent(e4);
							System.out.println(" ");
							
							break;
							
							case 3:
							AIUB.showAllStudents();
							System.out.println(" ");
							break;
							
							case 4:
							break;
							
							
							
							default:
							System.out.println("Wrong Input..");
							System.out.println(" ");
						}
						if(c2==4)break;
					}
					break;
					case 3:
					while(true)
					{
						System.out.println("Options For Course Transactions :");
						System.out.println("1. Adding Course.");
						System.out.println("2. Withdraw Course.");
						System.out.println("3. Go back.");
						int c3=user_input.nextInt();
						switch ( c3 )
						{
							case 1:
							int t=0;
							int f1=0;
							System.out.println("....Adding Course....");
							if(AIUB.StuIdx==0)
							{
								System.out.println("University has no Student.");
							}
							else{
								System.out.println("Enter Student ID to add courses:");
								int id8 =user_input.nextInt();
								for(int i=0;i<AIUB.StuIdx;i++){
									int temp=AIUB.student[i].getSid();
									if(id8==temp){
										f1=1;
										int no=AIUB.student[i].getNoCourse();
										t=no;
										if(no==6)System.out.println("Student has already taken 6 courses");
										else{
											System.out.println("How many course you want to add (Maximum "+(6-no)+" courses)?");
											int Nc =user_input.nextInt();
											for(int j=0;j<Nc;j++){
												Course co = new Course();
												System.out.println("Enter course number: ");
												int Cn =user_input.nextInt();
												co.setCourseNumber(Cn);
												System.out.println("Enter credit number: ");
												int CrN =user_input.nextInt();
												co.setCredit(CrN);
												AIUB.student[i].insertCourse(co);	
											}
											
											
										}
										if(t<AIUB.student[i].getNoCourse())System.out.println("Course Added.");
										
									}
								}
								if(f1==0)System.out.println("Student not found.");
								
							}
							
							/*System.out.println("How many courses do you want to add? ");
								int cr=user_input.nextInt();
								c.adding(cr);
								System.out.println("Course Added. ");
							System.out.println(" ");*/
							break;
							case 2:
							System.out.println("....Withdraw Course....");
							int f=0;
							
							if(AIUB.StuIdx==0)
							{
								System.out.println("University has no Student.");
							}
							else
							{
								System.out.println("Enter Student ID to add courses:");
								int id9 =user_input.nextInt();
								for(int i=0;i<AIUB.StuIdx;i++){
									int temp=AIUB.student[i].getSid();
									if(id9==temp){
										f=1;
										int no=AIUB.student[i].getNoCourse();
										if(no==0)System.out.println("Student has zero courses.");
										else{
										System.out.println("How many course you want to remove (Maximum "+no+" courses)?");
											int Nc1 =user_input.nextInt();
											for(int j=0;j<Nc1;j++){
												Course c1 =new Course();
												System.out.println("Enter course number: ");
												int Cn1 =user_input.nextInt();
												c1.setCourseNumber(Cn1);
												AIUB.student[i].removeCourse(c1);	
											}
										}
									}
								}
								if(f==0)System.out.println("Student not found.");
							}
							break;
							case 3:
							System.out.println(" ");
							break;
							default:
							System.out.println("Wrong Input..");
							System.out.println(" ");
						}
						if(c3==3)break;
					}
					break;
					case 4:
					
					System.exit(0); 
					
					
					default:
					System.out.println("Wrong Input..");
				}
			}
		}
		catch(Throwable ioe)
		{
			System.out.println("Invalid Input..");
			System.out.println(" ");
		}
	}
}
