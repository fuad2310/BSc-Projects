package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import Interface.*;


public class Student implements CourseOperations
{
	private String name; 
	private int sid;
	public static final int MAX_CRS=6;
	public Course courses[] = new Course[MAX_CRS];
	public int CINX=0;
	public void setName(String name)
	{
		this.name=name;
	}
	
	public void setSid(int sid)
	{
		this.sid=sid;
	}
	
	public void insertCourse(Course c)
	{
		try{
			int f=0;
			if(CINX<MAX_CRS){
				
				int id=c.getCourseNumber();
				for(int i=0;i<CINX;i++){
					int temp=courses[i].getCourseNumber();
					
					if( id==temp) {
						f=1;
						System.out.println("Course already exists.");
					}
					
				}
				if(f==0){
					
					courses[CINX]= c;
					if(CINX<MAX_CRS-1)CINX++;
				}
			}
			else {
				System.out.println("Maximum capacity reached so cannot insert.....");
			}
		}
		catch(Exception ioe)
		{
			System.out.println("Error");
		}
	}
	
	
	public void removeCourse(Course c)
	{
		int id=c.getCourseNumber();
		int f=0;
		for(int i=0;i<CINX+1;i++){
			int temp=courses[i].getCourseNumber();
			if( id==temp){
				for(int j=i;j<CINX+1;j++){
					courses[j]=courses[j+1]; //replacing current course with next one
				}
			}
			CINX--;
			f=1;
			break;
		}
	if(f==0)System.out.println("Course not found in records.....");
	if(f==1) System.out.println("Course dropped.....");
	}
	
	public Course getCourse(int CourseNumber)
	{
	int id=CourseNumber;
	int f=0;
	for(int i=0;i<CINX;i++){
	int temp=courses[i].getCourseNumber();
	if(id==temp){
	f=i;
	break;
	}
	}
	if(f!=0){return courses[f];}
	else {
	Course empty =new Course();
	System.out.println("Course not found in records.....");
	return empty;
	}
	}
	public void setRecord(int no)
	{
	FileReadWriteDemo F = new FileReadWriteDemo(); 
	F.writeInFilefors("[COURSES"," :]");
	F.writeInFilefors("..............",".......");
	for(int i=0;i<no;i++)
	{
	String str =Integer.toString(courses[i].getCourseNumber());
	F.writeInFilefors("Course NUMBER: ",str);
	
	}
	}
	public void showAllCourse()
	{
	for(int i=0;i<CINX;i++){
	System.out.println("Course Number: "+courses[i].getCourseNumber()+"  Course Credit:  "+courses[i].getCredit());
	}
	}
	
	public String getName()
	{
	return name;
	}
	
	public int getSid()
	{
	return sid;
	}
	public int getNoCourse(){
	return CINX;
	}
	}				