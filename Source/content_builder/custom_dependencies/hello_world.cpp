// hello_world.cpp
//
// Compile on Debian:
//   g++ hello_world.cpp -o hello_world.linux
//
// Run:
//   ./hello_world.linux
//   ./hello_world.linux --language English
//   ./hello_world.linux --language French

#include <iostream>
#include <string>

int main(int argc, char* argv[])
{
    std::string language = "English";

    for (int i = 1; i < argc; i++)
    {
        std::string argument = argv[i];

        if (argument == "--language" && i + 1 < argc)
        {
            language = argv[i + 1];
            i++;
        }
    }

    if (language == "French")
    {
        std::cout << "Bonjour le monde!" << std::endl;
    }
    else
    {
        std::cout << "Hello world!" << std::endl;
    }

    return 0;
}