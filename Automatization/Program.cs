using OpenQA.Selenium;
using OpenQA.Selenium.Firefox;
using System;
using System.Collections.Generic;
using System.IO;
using System.Threading;

class Program
{
    static List<TestResult> testResults = new List<TestResult>();
    static string reportDirectory = @"C:\Users\Usuario\source\repos\Automatization";

    static void Main(string[] args)
    {
        IWebDriver driver = new FirefoxDriver();
        driver.Navigate().GoToUrl("https://libreriagabriel.000webhostapp.com/");
        driver.Manage().Window.Maximize();

        RunTest(driver, "Captura pagina abierta", () =>
        {
            // Código para verificar la página de inicio
        });

        // Prueba: Ir a Libros
        RunTest(driver, "Ir a Libros", () =>
        {
            IWebElement librosLink = driver.FindElement(By.CssSelector("a.nav-link[href='libros.php']"));
            librosLink.Click();
            Thread.Sleep(5000);
            // Añadir aquí más acciones de prueba relacionadas con la página de libros si es necesario
        });

        // Prueba: Ir a Autores
        RunTest(driver, "Ir a Autores", () =>
        {
            IWebElement autoresLink = driver.FindElement(By.CssSelector("a.nav-link[href='autores.php']"));
            autoresLink.Click();
            Thread.Sleep(5000);
            // Añadir aquí más acciones de prueba relacionadas con la página de autores si es necesario
        });

        // Prueba: Ir a Contacto y enviar mensaje
        RunTest(driver, "Ir a Contacto y enviar mensaje", () =>
        {
            IWebElement contactoLink = driver.FindElement(By.CssSelector("a.nav-link[href='contacto.php']"));
            contactoLink.Click();
            Thread.Sleep(5000);

            // Rellenar formulario de contacto
            IWebElement nombreInput = driver.FindElement(By.Id("name"));
            nombreInput.SendKeys("Tu Nombre");
            Thread.Sleep(2500);

            IWebElement emailInput = driver.FindElement(By.Id("email"));
            emailInput.SendKeys("correo@example.com");
            Thread.Sleep(2500);

            IWebElement asuntoInput = driver.FindElement(By.Id("asunto"));
            asuntoInput.SendKeys("Asunto de prueba");
            Thread.Sleep(2500);

            IWebElement comentarioInput = driver.FindElement(By.Id("message"));
            comentarioInput.SendKeys("Este es un mensaje de prueba");
            Thread.Sleep(2500);

            IWebElement enviarButton = driver.FindElement(By.CssSelector("button.btn.btn-primary.btn-xl[type='submit']"));
            enviarButton.Click();
            Thread.Sleep(5000);
        });

        // Prueba: Regresar a la página de inicio
        RunTest(driver, "Regresar a la página de inicio", () =>
        {
            driver.Navigate().Back();
            Thread.Sleep(5000);

            IWebElement volverInicioLink = driver.FindElement(By.CssSelector("a.nav-link[href='index.php']"));
            volverInicioLink.Click();
            Thread.Sleep(5000);
        });

        GenerateHTMLReport();

    }

    public static void RunTest(IWebDriver driver, string testName, Action testAction)
    {
        try
        {
            testAction.Invoke();
            Capture(driver, $"{testName}_PASS");
            testResults.Add(new TestResult(testName, true, ""));
        }
        catch (Exception ex)
        {
            Capture(driver, $"{testName}_FAIL");
            testResults.Add(new TestResult(testName, false, ex.Message));
        }
    }

    public static void Capture(IWebDriver driver, string screenName)
    {
        string screenshotDirectory = Path.Combine(reportDirectory, "Screenshots");

        if (!Directory.Exists(screenshotDirectory))
        {
            Directory.CreateDirectory(screenshotDirectory);
        }

        ITakesScreenshot screenshotDriver = driver as ITakesScreenshot;
        Screenshot screenshot = screenshotDriver.GetScreenshot();
        string screenshotPath = Path.Combine(screenshotDirectory, $"{screenName}.png");
        screenshot.SaveAsFile(screenshotPath);
        Console.WriteLine($"Captura de pantalla guardada en: {screenshotPath}");
    }

    public static void GenerateHTMLReport()
    {
        string reportPath = Path.Combine(reportDirectory, "report.html");
        using (StreamWriter sw = new StreamWriter(reportPath))
        {
            sw.WriteLine("<html>");
            sw.WriteLine("<head><title>Test Report</title></head>");
            sw.WriteLine("<body>");
            sw.WriteLine("<h1>Test Report</h1>");
            sw.WriteLine("<table border='1'>");
            sw.WriteLine("<tr><th>Test Name</th><th>Status</th><th>Error Message</th></tr>");

            foreach (var result in testResults)
            {
                sw.WriteLine($"<tr><td>{result.TestName}</td><td>{(result.Passed ? "Pass" : "Fail")}</td><td>{result.ErrorMessage}</td></tr>");
            }

            sw.WriteLine("</table>");
            sw.WriteLine("</body>");
            sw.WriteLine("</html>");
        }

        Console.WriteLine($"Report generated: {reportPath}");
    }
}

public class TestResult
{
    public string TestName { get; set; }
    public bool Passed { get; set; }
    public string ErrorMessage { get; set; }

    public TestResult(string testName, bool passed, string errorMessage)
    {
        TestName = testName;
        Passed = passed;
        ErrorMessage = errorMessage;
    }
}
