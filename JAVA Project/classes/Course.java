package classes;
import java.lang.*;
import Interface.*;
import java.util.*;

public class Course implements CourseTransactions
{
	private int courseNumber;
	private int credit;
	//public Student s=new Student();
	
	public void setCourseNumber(int courseNumber)
	{
		this.courseNumber=courseNumber;
	}
	public void setCredit(int credit)
	{
		this.credit=credit;
	}
	
	public void adding(int quantity)                                 //File write
	{
		FileReadWriteDemo F1 = new FileReadWriteDemo();
		String str1 = Integer.toString(quantity); 
		F1.writeInFile("Course Added - ",str1);
	} 
	public void dropping ( int quantity)                           //File write
	{
		FileReadWriteDemo F1 = new FileReadWriteDemo();     
		String str1 = Integer.toString(quantity); 
		F1.writeInFile("Course dropped - ",str1);
	}
	
	public int getCourseNumber()
	{
		return courseNumber;
	}
	public int getCredit()
	{
		return credit;
	}
	public void showInfo()
	{
		System.out.println("Course Number : " +courseNumber);
		System.out.println("Credit : " +credit);
	}
}