package Interface;
import java.lang.*;
import classes.*;

public interface CourseOperations
{
	public void insertCourse(Course c);
	public void removeCourse(Course c);
	public Course getCourse(int CourseNumber);
	public void showAllCourse();
}