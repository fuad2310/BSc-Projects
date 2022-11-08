package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import classes.*;
import Interface.*;

public class University implements FacultyOperations,StudentOperations{
	
	public static int FacIdx=0;
	public static int StuIdx=0;
	public static final int MAX_PPL = 100; //maximum number of objects
	public Faculty faculty[] = new Faculty[MAX_PPL];
	public Student student[] = new Student[MAX_PPL];
	
	public void setFaculty(Faculty e){
		try{
			int f=0;
			String id=e.getFId();
			for(int i=0;i<FacIdx;i++){
				String temp=faculty[i].getFId();
				if( id.equals(temp) ){
					faculty[i]=e;
					f=1;
					break;
				}
			}
			if(f==0)System.out.println("Faculty not found in records.....");
			throw new Exception();
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void getFaculty(String fid){
		try{
			String id=fid;
			int f=0;
			for(int i=0;i<FacIdx;i++){
				String temp=faculty[i].getFId();
				if(id.equals(temp)){
					System.out.println("Faculty Name: "+faculty[i].getName());
					System.out.println("Faculty id: "+faculty[i].getFId());
					System.out.println("Salary: "+faculty[i].getSalary());
					f=1;
					break;
				}
			}
			if(f==0)System.out.println("Faculty not found in records.....");
			throw new Exception();
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void insertFaculty(Faculty e){
		try 
		{
			int f=0;
			if(FacIdx<MAX_PPL){
			    if(FacIdx>0)
				{
					String id=e.getFId();
					for(int i=0;i<FacIdx;i++){
						String temp=faculty[i].getFId();
						
						if( id.equals(temp) ){
							System.out.println("already exists.");
							f=1;
							break;
						}
					}
				}
				if(f==0){
					faculty[FacIdx]=e;
					if(FacIdx<MAX_PPL-1)FacIdx++;
					FileReadWriteDemo F = new FileReadWriteDemo(); 
					F.writeInFilefors(".........................FACULTYS","INFORMATION.............................");
					F.writeInFileforf("[NEW FACULTY"," ADDED]");
					F.writeInFileforf("..............",".......");
					F.writeInFileforf("FACULTY NAME - ",e.getName());
					F.writeInFileforf("FACULTY  ID  - ",e.getFId());
					String str =Double.toString(e.getSalary());
					F.writeInFileforf("SALARY       - ",str);
					F.writeInFileforf("  ","  ");
					
					System.out.println("Inserted new Faculty.");
				}
			}
			else{ System.out.println("Maximum capacity reached so cannot insert.....");}
		}
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void removeFaculty(Faculty e){
		try 
		{
			Faculty t=new Faculty();
			String id=e.getFId();
			int f=0;
			for(int i=0;i<FacIdx;i++){
				String temp=faculty[i].getFId();
				
				if( id.equals(temp) ){
					for(int j=i;j<FacIdx;j++){
						t=faculty[j];
						faculty[j]=faculty[j+1]; //replacing current faculty with next one
					}
				}
				
				FacIdx--;
				f=1;
				break;
			}
			if(f==0)System.out.println("Faculty not found in records.....");
			else 	{
				System.out.println("Removed Faculty Information :");
				System.out.println("Name    : " +t.getName());
				System.out.println("ID      : "+t.getFId());
				System.out.println("Salary  : "+t.getSalary());
				System.out.println(" ");
				FileReadWriteDemo F = new FileReadWriteDemo(); 
				F.writeInFileforf("[EXISTING FACULTY"," REMOVED]");
				F.writeInFileforf("..............",".......");
				F.writeInFileforf("FACULTY NAME - ",t.getName());
				F.writeInFileforf("FACULTY  ID  - ",t.getFId());
				String str =Double.toString(t.getSalary());
				F.writeInFileforf("SALARY       - ",str);
				F.writeInFileforf("  ","  ");
				
			}
			
			
		}
		
		
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void showAllFaculty(){
		try{
			if(FacIdx==0){
				System.out.println("University has no Faculty.");
			}
			else
			{
				for(int i=0;i<FacIdx;i++){
					System.out.println("Faculty Name: "+faculty[i].getName());
					System.out.println("Faculty id: "+faculty[i].getFId());
					System.out.println("Salary: "+faculty[i].getSalary());
					System.out.println();
					System.out.println();
				}
			}
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	//student code starts from here
	
	public void setStudent(Student s){
		try{
			int id=s.getSid();
			int f=0;
			for(int i=0;i<StuIdx;i++){
				int temp=student[i].getSid();
				if(id==temp){
					student[i]=s;
					f=1;
					break;
				}
			}
			if(f==0)System.out.println("Student not found in records.....");
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void getStudent(int sid) {
		try
		{
			int id=sid;
			int f=0;
			for(int i=0;i<StuIdx;i++){
				int temp=student[i].getSid();
				if(temp==id){
					System.out.println("Student Name: "+student[i].getName());
					System.out.println("Stuent ID: "+student[i].getSid());
					System.out.println("");
					f=1;
					break;
				}
			}
			if(f==0)System.out.println("Student not found in records.....");
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void InsertStudent(Student s,int no){
		try{
			int f=0;
			if(StuIdx<MAX_PPL){
				if(StuIdx>0)
				{
					int id=s.getSid();
					for(int i=0;i<StuIdx;i++){
						int temp=student[i].getSid();
						
						if( id==temp) {
							System.out.println("already exists.");
							f=1;
							break;
						}
					}
				}
				if(f==0){
					
					student[StuIdx]=s;
					
					if(StuIdx<MAX_PPL-1)StuIdx++;
					
					FileReadWriteDemo F = new FileReadWriteDemo(); 
					F.writeInFilefors(".........................STUDENTS","INFORMATION.............................");
					F.writeInFilefors("[NEW STUDENT"," ADDED]");
					F.writeInFilefors("..............",".......");
					F.writeInFilefors("STUDENT NAME - ",s.getName());
					String str =Integer.toString(s.getSid());
					F.writeInFilefors("STUDENT ID   - ",str);
					student[StuIdx-1].setRecord(no);
					F.writeInFilefors("  ","  ");
					
					System.out.println("Inserted new Student.");
				}
			}
			else System.out.println("Maximum capacity reached so cannot insert.....");
		}
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void removeStudent(Student s){
		try
		{
			int id=s.getSid();
			int f=0;
			Student p=new Student();
			for(int i=0;i<StuIdx;i++){
				int temp=student[i].getSid();
				if(id==temp){
					p=student[i];
					for(int j=i;j<StuIdx-1;j++){
						student[j]=student[j+1];
					}
					f=1;
					StuIdx--;
					break;
				}
			}
			if(f==0)System.out.println("Student not found in records.....");
			else 	{
				System.out.println("Removed Student Information :");
				System.out.println("Name    : " +p.getName());
				System.out.println("ID      : "+p.getSid());
				System.out.println(" ");
				FileReadWriteDemo F = new FileReadWriteDemo(); 
				F.writeInFilefors("[EXISTING STUDENT"," REMOVED]");
				F.writeInFilefors("..............",".......");
				F.writeInFilefors("STUDENT NAME - ",p.getName());
				String str =Integer.toString(p.getSid());
				F.writeInFilefors("STUDENT  ID  - ",str);
				F.writeInFilefors("  ","  ");
				
			}
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	public void showAllStudents(){
		try
		{
			if(StuIdx==0){
				System.out.println("University has no Student.");
			}
			else
			{
				for(int i=0;i<StuIdx;i++){
					System.out.println("Student Name: "+student[i].getName());
					System.out.println("Student ID: "+student[i].getSid());
					System.out.println("Courses details: \n");
					student[i].showAllCourse();
					System.out.println("\n\n");
				}
			}
		}
		
		catch(Exception ioe)
		{
			System.out.println("Invalid Input..");
		}
	}
	
	
}					