package Interface;
import java.lang.*;
import classes.*;
public interface StudentOperations
{
	public void setStudent(Student s);
	public void getStudent(int sid);
	public void InsertStudent(Student s,int no);
	public void removeStudent(Student s);
	public void showAllStudents();
	//public void AddCourse(int sid);
}